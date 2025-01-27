import React from 'react'

export default function Commonheader({title,subhead}) {
  return (
   <>
   <div className='w-full flex justify-center flex-col items-center my-[2%]  px-[5%] py-4  '>

    <p className='my-2 text-2xl'>
        {title}
    </p>
    <h2 className='text-6xl '>
        {subhead}

    </h2>

   </div>
   </>
  )
}
