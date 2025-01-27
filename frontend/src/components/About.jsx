import React from "react";
import Commonheader from "./Commonheader";

export default function About() {
  const abousData = [
    {
      id: 0,
      name: "Thailand",
      imgurl: "/about1.jpeg",
    },
    {
      id: 1,
      name: "Thailand",
      imgurl: "/about2.jpeg",
    },
    {
      id: 2,
      name: "Thailand",
      imgurl: "/about3.jpeg",
    },
    {
      id: 3,
      name: "Thailand",
      imgurl: "/about4.jpeg",
    },
  ];

  return (
    <>
      <div>
        <Commonheader title="Choose your" subhead="Destination" />

        <div className="px-[6%] ">
          <div className="grid grid-cols-2 gap-4">
     
            <div
              className="bgshade relative w-full  bg-cover bg-center"
              style={{ backgroundImage: `url(${abousData[0].imgurl})` }}
            ></div>

           
            <div className="grid grid-rows-2 gap-4">
              <div className="grid grid-cols-2 gap-4">
               
                <div
                  className="bgshade relative w-full h-[100%] bg-cover bg-center"
                  style={{ backgroundImage: `url(${abousData[3].imgurl})` }}
                ></div>
                <div
                  className="bgshade relative w-full h-[100%] bg-cover bg-center"
                  style={{ backgroundImage: `url(${abousData[2].imgurl})` }}
                ></div>
              </div>
            
              <div
                className="bgshade relative w-full h-[350px] bg-cover bg-center"
                style={{ backgroundImage: `url(${abousData[1].imgurl})` }}
              ></div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
