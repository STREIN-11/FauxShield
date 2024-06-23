// import React from 'react'
import './Hero.css'

// const Hero = () => {
//   return (
//     <div  className='hero container'>
//     <div className='hero'>
//       <div className="hero-text">
//         <h1>Detection of DeepFake Videos and Photos</h1>
//         <p>By using this system you can identify and detect DeepFake videos and images</p>
//         <form class="form">
//           <div class="file-upload-wrapper" data-text="Select an image or video here...">
//             <input name="file-upload-field" type="file" class="file-upload-field" value=""></input>
//           </div>
//         </form>
//       </div>
//     </div>
//     </div>
//   )
// }

// Filename - App.js

import axios from "axios";

import React, { Component } from "react";

class Hero extends Component {
  ImageUpload = () => {
    const [avatarURL, setAvatarURL] = useState(DefaultImage);
  
    const fileUploadRef = useRef();
  
    const handleImageUpload = (event) => {
      event.preventDefault();
      fileUploadRef.current.click();
    }
  
    const uploadImageDisplay = async () => {
      try {
        setAvatarURL(UploadingAnimation);
        const uploadedFile = fileUploadRef.current.files[0];
        // const cachedURL = URL.createObjectURL(uploadedFile);
        // setAvatarURL(cachedURL);
        const formData = new FormData();
        formData.append("file", uploadedFile);
  
        const response = await fetch("https://api.escuelajs.co/api/v1/files/upload", {
          method: "post",
          body: formData
        });
  
        if (response.status === 201) {
          const data = await response.json();
          setAvatarURL(data?.location);
        }
      } catch(error) {
        console.error(error);
        setAvatarURL(DefaultImage);
      }
    }
  };
// 	state = {
// 		// Initially, no file is selected
// 		selectedFile: null,
// 	};

// 	// On file select (from the pop up)
// 	onFileChange = (event) => {
// 		// Update the state
// 		this.setState({
// 			selectedFile: event.target.files[0],
// 		});
// 	};

// 	// On file upload (click the upload button)
// 	onFileUpload = () => {
// 		// Create an object of formData
// 		// event.preventDefault()
//     const url = 'http://localhost:3000/uploadFile';
//     const formData = new FormData();
//     formData.append('file', file);
//     formData.append('fileName', file.name);
//     const config = {
//       headers: {
//         'content-type': 'multipart/form-data',
//       },
//     };
//     axios.post(url, formData, config).then((response) => {
//       console.log(response.data);
//     });
// 	};

// 	// File content to be displayed after
// 	// file upload is complete
//   fileData = () => {
//     if (this.state.selectedFile) {
//         return (
//             <div>
//                 <h2>File Details:</h2>
//                 <p>
//                     File Name:{" "}
//                     {this.state.selectedFile.name}
//                 </p>

//                 <p>
//                     File Type:{" "}
//                     {this.state.selectedFile.type}
//                 </p>

//                 <p>
//                     Last Modified:{" "}
//                     {this.state.selectedFile.lastModifiedDate.toDateString()}
//                 </p>
//             </div>
//         );
//     } else {
//         return (
//             <div>
//                 <br />
//                 <h4>
//                     Choose before Pressing the Upload
//                     button
//                 </h4>
//             </div>
//         );
//     }
// };
  // function handleSubmit(event) {
    // event.preventDefault()
    // const url = 'http://localhost:3000/uploadFile';
    // const formData = new FormData();
    // formData.append('file', file);
    // formData.append('fileName', file.name);
    // const config = {
    //   headers: {
    //     'content-type': 'multipart/form-data',
    //   },
    // };
    // axios.post(url, formData, config).then((response) => {
    //   console.log(response.data);
    // });

// }

	render() {
		return (
  <div  className='hero container'>
  <div className='hero'>
    <div className="hero-text">
      <h1>Detection of DeepFake Videos and Photos</h1>
      <p>By using this system you can identify and detect DeepFake videos and images</p>
        <form method="post">
          <input type="file" name="file" value=""></input>
          <input type="submit" value="Submit" name="submit"></input>
        </form>
        </div>
    </div>
  </div>
)
	}
}


export default Hero