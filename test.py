import cv2
import tensorflow as tf
from tensorflow.keras.preprocessing import image

with open("file.txt","r") as fp:
    file = fp.readline()
import numpy as np



# file = "data_onepage\\fake\\fake_2.jpg"
aud = ["mp3","opus","wav","m4a","ogg"]
imag = ["jpg","png","jpeg","webp"]
video = ["mp4","avif","gif"]
print(file[15:])
if file[15:] in imag:
    def load_and_preprocess_image(img_path):
        """Load and preprocess image."""
        img = image.load_img(img_path, target_size=(224, 224))  # Xception model input size
        img = image.img_to_array(img)
        img = np.expand_dims(img, axis=0)
        img /= 255.0  # Rescale to [0, 1]
        return img
    img = load_and_preprocess_image(file)
    name = "all_in_one_Cainvas_vgg.h5"
    model = tf.keras.models.load_model(name)

    prediction = model.predict(img)
    preds = np.argmax(prediction[0])


    if preds == 0:
        text = "Fake"
    else:
        text = "Real"

    with open("uploads/pred.txt","w") as fp:
        fp.write(text)



elif file[15:] in video:
    name = "all_in_one.h5"
    # import cv2
    # import numpy as np
    from tensorflow.keras.models import load_model

    # Load your pre-trained model
    model = load_model("all_in_one.h5")

    def extract_frames(video_path):
        cap = cv2.VideoCapture(video_path)
        frames = []
        
        while True:
            ret, frame = cap.read()
            if not ret:
                break
            frames.append(frame)
        
        cap.release()
        return frames

    def preprocess_frame(frame):
        # Resize the frame as per your model input requirement
        frame = cv2.resize(frame, (300, 300))
        frame = frame.astype('float32') / 255.0
        return np.expand_dims(frame, axis=0)

    def predict_frames(frames):
        predictions = []
        
        for frame in frames:
            preprocessed_frame = preprocess_frame(frame)
            prediction = model.predict(preprocessed_frame)
            predictions.append(prediction)
        
        return np.array(predictions)

    def mai(video_path):
        frames = extract_frames(video_path)
        predictions = predict_frames(frames)
        
        avg_prediction = np.mean(predictions)
        # Determine if the video is a deepfake or real
        result = 'Fake' if avg_prediction > 0.5 else 'Real'
        
        # Write all predictions
        with open('uploads/pred.txt', 'w') as f:
            f.write(f'{result}')
        
        
        # print(f'The video is: {result}')

    # Path to your video file
    # video_path = file

    # Run the main function
    mai(file)
elif file[15:] in aud:
    import os
    import torch
    import json
    import librosa
    import numpy as np
    import torch.nn.functional as F
    from tqdm import tqdm

    # Add the directory containing the 'models' directory to the Python path
    import sys
    sys.path.append(os.path.abspath(os.path.join(os.path.dirname(__file__), '..')))

    from models.cnn_model import CNNTest

    def load_model(model_path):
        print(f"Loading model from: {model_path}")
        model = CNNTest()
        model.load_state_dict(torch.load(model_path, map_location=torch.device('cpu')))
        model.eval()
        return model

    def preprocess_audio(audio_path, sr=16000, duration=3, global_mean=-58.18715250929163, global_std=15.877255962380845):
        y, _ = librosa.load(audio_path, sr=sr)
        y = librosa.util.fix_length(y, size=sr * duration)
        y = np.clip(y, -1.0, 1.0)
        clips = [y[i:i + sr * duration] for i in range(0, len(y) - sr * duration + 1, sr * duration)]
        
        processed_clips = []
        for clip in clips:
            S = np.abs(librosa.stft(clip))**2
            S_db = librosa.power_to_db(S + 1e-10, ref=np.max)
            S_db = (S_db - global_mean) / global_std

            target_shape = (1025, 94)
            if S_db.shape != target_shape:
                S_db = np.pad(S_db, (
                    (0, max(0, target_shape[0] - S_db.shape[0])), 
                    (0, max(0, target_shape[1] - S_db.shape[1]))
                ), mode='constant', constant_values=global_mean)
                S_db = S_db[:target_shape[0], :target_shape[1]]
            spectrogram_tensor = torch.tensor(S_db, dtype=torch.float32).unsqueeze(0)
            processed_clips.append(spectrogram_tensor)
            
        return processed_clips

    def predict_neural_for_testing(clips, model):
        model.eval()
        results = {'chunk_results': []}
        overall_probs = []
        
        with torch.no_grad():
            for i, clip in enumerate(clips):
                try:
                    output = model(clip.unsqueeze(0))
                    probs = F.softmax(output, dim=1)
                    probability_ai = round(probs[0][0].item() * 100, 2)
                    prediction = output.argmax(dim=1).item()
                
                    if probability_ai > 60:
                        predicted_label = 'ai'
                        confidence = probability_ai
                    elif probability_ai < 40:
                        predicted_label = 'human'
                        confidence = 100 - probability_ai
                    else:
                        predicted_label = "unsure"
                        confidence = 100 - probability_ai

                    chunk_result = {
                        "chunk": i + 1,
                        "prediction": predicted_label,
                        "confidence": f"{confidence:.2f}%",
                        "Probability_ai": f"{probability_ai:.2f}%"
                    }
                    results['chunk_results'].append(chunk_result)
                    overall_probs.append(probability_ai)
                except Exception as e:
                    print(e)
            
            ai_chunk_count = sum(1 for result in results['chunk_results'] if result['prediction'] == 'ai')
            percentage_ai_chunks = (ai_chunk_count / len(clips)) * 100

            if percentage_ai_chunks >= 50:
                overall_prediction = 'ai'
            elif percentage_ai_chunks >= 20 and percentage_ai_chunks <= 49:
                overall_prediction = 'contains some ai'
            else:
                overall_prediction = 'human'

            print(f"Overall prediction: {overall_prediction}")
            results.update({
                "status": "success",
                "prediction": overall_prediction
            })

            return results

    def process_audio_file(audio_file, model, sample_rate):
        try:
            clips = preprocess_audio(audio_file, sr=sample_rate)

            result = predict_neural_for_testing(clips, model)

            ai_count = sum(1 for result in result['chunk_results'] if result['prediction'] == "ai")
            human_count = sum(1 for result in result['chunk_results'] if result['prediction'] == "human")
            total = len(result['chunk_results'])

            return {
                "name": audio_file,
                "Percent_AI": (ai_count / total) * 100,
                "Percent_Human": (human_count / total) * 100,
                "Prediction": "ai" if ai_count > human_count else "human",
            }
        except Exception as e:
            print(f"Error processing audio file: {e}")

            return {
                "name": audio_file,
                "Percent_AI": 1,
                "Percent_Human": 0,
                "Prediction": "ai",
            }

    def main():
        model_path = "CNN_Ai-SPY.pth"
        sample_rate = 16000
        audio_file = file

        model = load_model(model_path)
        result = process_audio_file(audio_file, model, sample_rate)
        print(json.dumps(result, indent=2))
        if result["Prediction"] == "ai":
            text = "Fake"
        else :
            text = "Real"
        with open('uploads/pred.txt', 'w') as f:
            f.write(text)

    if __name__ == "__main__":
        main()


with open("status.txt","w") as fp:
    fp.write("0")