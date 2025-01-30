const changeLang = document.querySelector('.change-lang');
const changeLnMenu = document.querySelector('.change-lang-menu');

if(changeLang){
     changeLang.addEventListener('click', (event) => {
          event.stopPropagation();
          document.querySelector('.change-lang-menu').classList.toggle("show")
     })


       document.addEventListener("click", (event) => {
               if(changeLnMenu.classList.contains("show")){
                   changeLnMenu.classList.remove("show")
               } 
          });
}

const showMenu = document.querySelector('.show-menu');

if(showMenu){
     showMenu.addEventListener("click", () => {
          document.querySelector('.responsive-menu').classList.add("show")
          document.querySelector('.overlay').classList.add("show")
     })


     document.querySelector('.overlay').addEventListener("click", () => {
          document.querySelector('.responsive-menu').classList.remove("show")
          document.querySelector('.overlay').classList.remove("show")
     })
}


if ($(".owl-carousel.carousel-hero").length > 0) {

     $(".owl-carousel.carousel-hero").owlCarousel({
       loop: true,
       margin: 10,
       nav: true,
       autoplay: true,
       autoplayTimeout: 3000,
       autoplayHoverPause: true,
       smartSpeed: 1000,
       responsive: {
         0: {
           items: 1
         }
       }

     });
   }
    

   $(".owl-carousel.owl-partner").owlCarousel({
     loop: true,
     margin: 10,
     nav: false,
     dots: false,
     autoplay: true,
     autoplayTimeout: 3000,
     autoplayHoverPause: true,
     smartSpeed: 1000, 
     responsive:{
          0:{
              items:2
          },
          500:{
              items:3
          },
          700:{
              items:3
          },
          1000:{
              items:4
          },
          1200:{
              items:5
          }

      } 
    
   });
   

   $(".owl-carousel.owl-customers").owlCarousel({
     loop: true,
     margin: 20,
     nav: true,
     navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>"],
     dots: false,
     autoplay: true,
     autoplayTimeout: 3000,
     autoplayHoverPause: true,
     smartSpeed: 1000, 
     responsive:{
          0:{
            nav: false,
              items:1
              
          },
          950:{
            nav: false,
            items:2
          },

          1000:{
            nav: true,
              items:2
          },


      } 
    
   });
   

   

  //  counter

  if ($(".counter").length) {
    var a = 0;
    $(window).scroll(function () {
      var oTop = $(".counter-box").offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $(".counter").each(function () {
          var $this = $(this),
            countTo = $this.attr("data-number");
          $({
            countNum: $this.text(),
          }).animate(
            {
              countNum: countTo,
            },
  
            {
              duration: 2550,
              easing: "swing",
              step: function () {
                 
                $this.text(Math.ceil(this.countNum).toLocaleString("en"));
              },
              complete: function () {
                $this.text(Math.ceil(this.countNum).toLocaleString("en"));
                
              },
            }
          );
        });
        a = 1;
      }
    });
  
    const animationDuration = 4000;
  
    const frameDuration = 1000 / 60;
  
    const totalFrames = Math.round(animationDuration / frameDuration);
  
    const easeOutQuad = (t) => t * (2 - t);
  
    const animateCountUp = (el) => {
      let frame = 0;
      const countTo = parseInt(el.innerHTML, 10);
  
      const counter = setInterval(() => {
        frame++;
  
        const progress = easeOutQuad(frame / totalFrames);
  
        const currentCount = Math.round(countTo * progress);
  
        if (parseInt(el.innerHTML, 10) !== currentCount) {
          el.innerHTML = currentCount;
        }
  
        if (frame === totalFrames) {
          clearInterval(counter);
        }
      }, frameDuration);
    };
  
    const countupEls = document.querySelectorAll(".timer");
    countupEls.forEach(animateCountUp);
  
    $(".animated-progress span").each(function () {
      $(this).animate(
        {
          width: $(this).attr("data-progress") + "%",
        },
        2100
      );
      $(this).text($(this).attr("data-progress") + "%");
    });
  }
   
if ($(".owl-carousel.department_classifications_slider").length > 0) {
     $(".owl-carousel.department_classifications_slider").owlCarousel({
          loop: true,
          margin: 10,
          // nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true,
          smartSpeed: 1000,  
          responsive: {
            0: {
              items: 1
            }, 500: {
               items: 2
            }, 1024: {
               items: 3
            }, 1200: {
               items: 4
            }
          }
        });
}


   
const changePasswordType = document.querySelector('.input-frm .icon');
const passInput = document.querySelector('.frm-pass-text');

const eye =  document.querySelector('.input-frm .icon i');

if(changePasswordType){
     changePasswordType.addEventListener("click", () => {
          if(passInput.getAttribute("type") === "password"){
               passInput.setAttribute("type", "text")
          } else{
               passInput.setAttribute("type", "password")
          }

          if(eye.className === "fa-regular fa-eye-slash"){
              eye.className = "fa-regular fa-eye"
          } else{
              eye.className = "fa-regular fa-eye-slash"
          }
     })
}


const inputsVerification = document.querySelectorAll('.verify-inputs input');

if (inputsVerification.length > 0) { // Check if inputs exist
    inputsVerification.forEach((input, index) => {
        input.addEventListener("change", () => {
            // Ensure the next input exists before focusing
            if (index + 1 < inputsVerification.length) { 
                inputsVerification[index + 1].focus();
            }
        });
    });
}

const filterMenus = document.querySelectorAll('.filter-menu');
const filterMenusHeaders = document.querySelectorAll('.filter-heading');

if(filterMenus){
     filterMenusHeaders.forEach((item, index) => {
          item.addEventListener("click", () => {
            console.log("first")
               filterMenus[index].classList.toggle("collabsibg")
          })
     })
}



let soundTimeout;

let imageDog = document.querySelector('.image-dog');
if (imageDog) {
  
  // Ensure audio plays only after user interaction

  
  document.querySelector('.image-dog').addEventListener('mouseenter', function() {
          const audio = document.getElementById('catSound');
          console.log('Audio element:', audio);
          
          // Check if the play method is available and the audio can be played
          audio.play().catch((error) => {
              console.log('Audio playback was prevented:', error);
          });
  });
  
  document.querySelector('.image-dog').addEventListener('mouseleave', function() {
      const audio = document.getElementById('catSound');
      audio.pause();
      audio.currentTime = 0; // Reset sound to the start
  });
}


if(document.querySelector('.dog-sound')){

  
  document.getElementById('enableAudio').addEventListener('click', function() {

  document.querySelector('.dog-sound').addEventListener('mouseenter', function() {
     
          const audio = document.getElementById('dogSound');
          
          
          // Check if the play method is available and the audio can be played
          audio.play().catch((error) => {
              console.log('Audio playback was prevented:', error);
          });
     
  });
  
  document.querySelector('.dog-sound').addEventListener('mouseleave', function() {

      const audio = document.getElementById('dogSound');
      audio.pause();
      audio.currentTime = 0; // Reset sound to the start
  });

});


}


if (document.querySelector('.sound-cat')) {


  
  // Ensure audio plays only after user interaction
  document.querySelector('.sound-cat').addEventListener('mouseenter', function() {
    soundTimeout = setTimeout(() => {
        const audio = document.getElementById('soundCat');
        // Check if the play method is available and the audio can be played
        audio.play().catch((error) => {
            console.log('Audio playback was prevented:', error);
        });
    }, 100); // Delay of 1 second
  });
  
  document.querySelector('.sound-cat').addEventListener('mouseleave', function() {
    clearTimeout(soundTimeout); // Clear the timeout
    const audio = document.getElementById('soundCat');
    audio.pause();
    audio.currentTime = 0; // Reset sound to the start
  });
  

} 



if (document.querySelector('.sound-birds')) {


  
  // Ensure audio plays only after user interaction
  document.querySelector('.sound-birds').addEventListener('mouseenter', function() {
        const audio = document.getElementById('birds');
        // Check if the play method is available and the audio can be played
        audio.play().catch((error) => {
            console.log('Audio playback was prevented:', error);
        });
  });
  
  document.querySelector('.sound-birds').addEventListener('mouseleave', function() {
    const audio = document.getElementById('soundCat');
    audio.pause();
    audio.currentTime = 0; // Reset sound to the start
  });
  

} 






// window.addEventListener('load', function() {
//   const audio = document.getElementById('birds');

//   audio.play().catch((error) => {
//       console.log('Audio playback was prevented:', error);
//   });
// });

// if (document.getElementById('birds')) {
  
//   window.addEventListener('load', function() {
//     const audio = document.getElementById('birds');
  
//     function tryPlayAudio() {
//         audio.play().catch((error) => {
//             console.log('Audio playback was prevented:', error);
//         });
//     }
  
//     // Attempt to play audio on page load
//     tryPlayAudio();
  
//     // Also try to play when the page becomes visible again
//     document.addEventListener('visibilitychange', function() {
//         if (document.visibilityState === 'visible') {
//             tryPlayAudio();
//         }
//     });
//   });
// }



if ( document.getElementById('loading-screen')) {
  
  window.addEventListener('load', function() {
    // Hide the loading screen
    document.getElementById('loading-screen').style.display = 'none';
  
    // Show the main content
    document.getElementById('main-content').style.display = 'block';
  
    // Attempt to play audio
    const audio = document.getElementById('dogSound');
    audio.play().catch((error) => {
        console.log('Audio playback was prevented:', error);
    });
  });
  window.onload = function() {
    // All resources (images, audio, scripts, etc.) are fully loaded
  
    // Hide the loading screen
    document.getElementById('loading-screen').style.display = 'none';
  
    // Show the main content
    document.getElementById('main-content').style.display = 'block';
  
    // Play the audio after everything is loaded
    const audio = document.getElementById('dogSound');
    audio.play().catch((error) => {
        console.log('Audio playback was prevented:', error);
    });
  };
}






// slick

$(document).ready(function(){
  // Main slider
 if ($('.slider-for').length) {


  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});

// Thumbnail navigation slider
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    focusOnSelect: true,
    arrows: false,
    centerMode: true,
    centerPadding: '0',
});


 }
});

// radios select add active to .size-item select
$('.size-item').on('click', function() {
  $('.size-item').removeClass('active');
  $(this).addClass('active');
});



// <div class="details-counter">
//                                 <div class="counter">
//                                     <button class="counter-btn" onclick="decrement()">-</button>
//                                     <input type="text" id="counter" value="1">
//                                     <button class="counter-btn" onclick="increment()">+</button>
//                                 </div>
//                                 <div class="add-to-cart">
//                                     <button class="add-to-cart-btn" type="submit">أضف إلى السلة</button>
//                                 </div>
//                              </div> this is the code for the counter and the add to cart button in the details page create a function for the counter
function increment() {
    var input = document.getElementById("counter");
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}
// create decrementt function
function decrement() {
    var input = document.getElementById("counter");
    var value = parseInt(input.value, 10);
    if (value > 1) {
        value = isNaN(value) ?
        0 : value;
        value--;
        input.value = value;
    }

}


const confirmPasswordInput = document.getElementById('confirm-password');
const confirmPasswordInputs = document.querySelectorAll('input[type="password"]');
const confirmPasswordIcons = document.querySelectorAll('.input-group img');

confirmPasswordIcons.forEach((icon, index) => {
  icon.addEventListener('click', () => {
    const input = confirmPasswordInputs[index];
    if (input.getAttribute('type') === 'password') {
      input.setAttribute('type', 'text');
      icon.src = 'images/icons-eye-slash (1).svg';
    } else {
      input.setAttribute('type', 'password');
      icon.src = 'images/icons.svg';
    }
  });
});


// 


// Select the parent element
const orderStatus = document.querySelector('.order-status');

// Check all child elements

if(orderStatus){
  const children = orderStatus.querySelectorAll('.order-status-icon .init-group.done');

    // Calculate width based on the position of the last `.done` child
    if (children.length > 0) {
      const lastChildIndex = Array.from(children).length; // Get the number of `.done` elements
      
      
      
      
      // Adjust the `::after` width
      const widthPercentage = (lastChildIndex-1) * 33.3; // Multiply by 33.3 for each completed step
      orderStatus.style.setProperty('--progress-width', `${widthPercentage}%`);
    }
}



