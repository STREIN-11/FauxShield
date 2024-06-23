import React from 'react'
import './Navbar.css'
import logo from '../../assets/logo.png'

const Navbar = () => {
  return (
    <nav className='container'>
        <img src={logo} alt=""  className='logo'  />
        <p class="navbar-text" >Deepfake Ai</p>
        <ul>
            <li>Home</li>
            <li>Deepfake Detector</li>
            <li>About us</li>
            <li><button className='btn'>Contact us</button></li>
        </ul>
    </nav>
  )
}

export default Navbar