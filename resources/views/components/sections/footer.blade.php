<footer class="px-2 my-12 w-full text-center text-white md:px-4 md:my-16">
    <h2 class="max-w-5xl text-3xl text-left md:text-6xl xl:text-7xl">For new business inquiries please email to <a href="mailto:veldwischthijs@gmail.com" class="underline duration-100 ease-in-out text-neutral-400 hover:text-white trasistion">veldwischthijs@gmail.com</a></h2>
    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 md:mt-6">
        <div class="mr-6 text-lg text-left md:text-xl">
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
          class="mt-4 mr-6 text-lg text-left md:text-xl md:mt-0"
        >
          <p class="text-neutral-400" x-text="time"></p>
          <p class="text-neutral-400">Development by <a href="https://sanderr.site/" class="text-white underline duration-100 ease-in-out hover:text-neutral-300 trasistion">Sander</a></p>
        </div>
    </div>
</footer>
