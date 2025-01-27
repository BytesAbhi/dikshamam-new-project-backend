import React from 'react'

export default function Navbar() {
  return (
   <>
   <nav className='w-full  text-white flex items-center  fixed top-0 z-10  justify-between  px-[6%] py-5' >

     <div className='logo'>

        <h2  className='text-xl font-bold ' >
        Listee Travel
        </h2>

     </div>

    <div className='main-menu '>

        <ul className='flex gap-5'>
            <li  className='text-lg font-semibold'>Home</li>
            <li className='text-lg font-semibold' >About   </li>

            <li className='text-lg font-semibold' >Destinations</li>


            <li className='text-lg font-semibold' >Service</li>

            <li className='text-lg font-semibold' >Blog</li>


            <li className='text-lg font-semibold' >Contact</li>

            
        </ul>

    </div>

    <div className='log-in-btn text-white'>

        <button className='px-6 py-2 underline font-bold text-lg'>
            Sign in
        </button>

        <button className='px-6 py-2 font-bold text-lg rounded-4xl' style={{background: 'linear-gradient(90deg, #CD1A40 -11%, #FF803C 109.5%)'}} >
           Sign up
        </button>

    </div>

     


   </nav>
   </>
  )
}
