import React from "react";
import { IoIosSearch } from "react-icons/io";
import { IoLocationOutline } from "react-icons/io5";
import { SlCalender } from "react-icons/sl";

export default function Hero() {
  return (
    <>
      <div
        className="main-bg w-full h-[80vh] flex items-center relative "
        style={{
          backgroundImage: "url(/image.webp)",
          backgroundSize: "100% 100%",
        }}
      >
        <div className="w-full z-20 px-[6%] mt-[50px]   py-6 ">
          <div className="w-1/2 text-white ">
            <p className="my-2 text-3xl font-semibold">Explorer and Travel</p>
            <h1 className="my-2 text-8xl font-semibold">Let’s Go Now</h1>
            <p className="text-lg my-5 pr-[6%]">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500s,
            </p>
          </div>

          <div className="w-1/2 mt-8 pr-[8%]">
            <div className="w-full flex px-5 relative py-4 justify-between items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-4xl p-4">
              <div className="flex flex-col">
                <label className="text-white font-semibold ">Location</label>
                <div className="flex items-center">
                <IoLocationOutline className="text-3xl mr-1 font-bold  text-white"/>
                <input
                  className="w-full  font-bold text-white  rounded-lg text-xl border border-none focus:outline-none f"
                  type="text"
                  placeholder="Your Name"
                  value="Thailand"
                />

                </div>

                <span className="absolute w-[2px] h-[45px] bg-white  left-65 ">
                
              </span>
              
              </div>



              <div className="flex flex-col">
                <label className="text-white font-semibold ">Date</label>
                <div className="flex items-center">
                 <SlCalender className="text-3xl mr-1 font-bold  text-white"/>
                 <input
                  className="w-full  text-white rounded-lg text-xl border border-none focus:outline-none appearance-none"
                  type="date"
                />
                 </div>
              </div>

              <div>
                <button
                  className="px-4 py-4 font-bold text-white text-lg rounded-xl"
                  style={{
                    background:
                      "linear-gradient(90deg, #CD1A40 -11%, #FF803C 109.5%)",
                  }}
                >
                  <IoIosSearch className="text-2xl font-bold " />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
