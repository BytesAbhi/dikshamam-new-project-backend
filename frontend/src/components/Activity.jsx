import React from 'react'
import Commonheader from './Commonheader'

export default function Activity() {

    const activitydata = [
       {
        id: 1,
        name: 'Adventure',
        imgurl: '/layer1.svg',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elementum justo. Sed viverra, mauris vel mollis consectetur, sapien felis facilisis velit, vitae posuere neque felis ac dolor.'
       },
       {
        id: 2,
        name: 'Camping',
        imgurl: '/layer2.svg',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elementum justo. Sed viverra, mauris vel mollis consectetur, sapien felis facilisis velit, vitae posuere neque felis ac dolor.'
       },
       {
        id: 3,
        name: 'Trekking',
        imgurl: '/layer3.svg',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elementum justo. Sed viverra, mauris vel mollis consectetur, sapien felis facilisis velit, vitae posuere neque felis ac dolor.'
       },
       {
        id: 4,
        name: 'Off Road',
        imgurl: '/layer4.svg',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elementum justo. Sed viverra, mauris vel mollis consectetur, sapien felis facilisis velit, vitae posuere neque felis ac dolor.'
       },
       {
        id: 5,
        name: 'Camp Fire',
        imgurl: '/layer5.svg',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elementum justo. Sed viverra, mauris vel mollis consectetur, sapien felis facilisis velit, vitae posuere neque felis ac dolor.'
       },
       {
        id: 6,
        name: 'Expiring',
        imgurl: '/layer6.svg',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elementum justo. Sed viverra, mauris vel mollis consectetur, sapien felis facilisis velit, vitae posuere neque felis ac dolor.'
       },
    ]
  return (
   <>

   <div>

    <Commonheader title='Travel by' subhead="Activity" />

    <div className="px-[6%] ">

        <div className='w-full  grid grid-cols-3 gap-4 justify-items-center items-center'>

            {
                activitydata.map((item,ind) => (
                    <>
                    <div className=' w-[370px]  h-[400px] flex items-center justify-around flex-col  px-5 py-4 bg-[#FFF9F0]'>

                        <div>

                            <img className='mt-5' src={item.imgurl} alt="" />

                        </div>

                        <div>
                            <h2 className='text-[#999999] my-2 text-center text-xl font-semibold'>
                                {item.name}
                            </h2>
                            <p className='text-[#999999] text-center text-md'>
                                {item.description}
                            </p>
                        </div>





                    </div>
                    
                    </>
                ))
            }

        </div>


    </div>


   </div>
   
   </>
  )
}
