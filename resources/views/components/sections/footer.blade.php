<footer class="text-white w-full text-center px-2.5 md:px-4 my-12 md:my-16">
    <h2 class="text-3xl md:text-6xl xl:text-7xl text-left max-w-5xl">For new business inquiries please email to <a href="mailto:veldwischthijs@gmail.com" class="text-neutral-400 underline hover:text-neutral-500 trasistion ease-in-out duration-100">veldwischthijs@gmail.com</a></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 mt-10 md:mt-20">
        <div class="mr-6 text-left text-lg md:text-xl">
          <p class="text-neutral-400">All contents of this website are the property of Studio Thijs Veldwisch. No part of this site, including all text and images, may be reproduced in any form without the prior written consent of Studio Thijs Veldwisch. © 2024 STUDIO THIJS VELDWISCH. All rights reserved. 
          </p>
        </div>
        <div 
          x-data="{ 
              time: new Intl.DateTimeFormat('en-US', { 
                  hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true, 
                  month: 'long', day: 'numeric', year: 'numeric' 
              }).format(new Date()) 
          }" 
          x-init="setInterval(() => { 
              time = new Intl.DateTimeFormat('en-US', { 
                  hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true, 
                  month: 'long', day: 'numeric', year: 'numeric' 
              }).format(new Date()) 
          }, 1000)"
          class="mr-6 text-left text-md md:text-xl mt-4 md:mt-0"
        >
          <p class="text-neutral-400" x-text="time"></p>
          <p class="text-neutral-400">Development by <a href="https://sanderr.site/" class="text-white underline hover:text-neutral-300 trasistion ease-in-out duration-100">Sander</a></p>
        </div>
    </div>
</footer>
