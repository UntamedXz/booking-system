<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require 'lib/header.php';
require 'lib/nav.php';
?>
<!-- Navigation-->
<head>
    <style>
        .container {
  margin: 0 auto;
  padding: 15px;
}

.section__heading {
  margin: 0 20px;
}

.article {
    background: white;
  border: 1px solid #dbdbdb;
  margin: 20px;
  -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.06);
  -moz-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.06);
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.06);
  position: relative;}
  .article__content {
    padding: 20px;
  }
  
  .article__category {
    color: var(--accent);
    font-size: 0.75rem;
    letter-spacing: .075rem;
    line-height: 16px;
    margin: 0 5px;
    font-weight: 700;
    text-transform: uppercase;
  }
  .article__title {
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 24px;}
    a {
      display: block;}
      .article:hover {
        color: #444;
      }
    
  
  .article__footer {
    color: #818181;
    font-size: 0.875rem;
    margin-top: 10px;
  }
  .article__author {
    font-weight: 700;    
  }
  .article__date::before {
    content: "\2022";
    padding: .9rem;
  }

/* desktop */

@media (min-width: 700px) {
  h2 {
    font-size: 1.5rem;
    line-height: 34px;
  }

  .container {
    width: 900px;
  }

  .article {
    display: flex;}
    .article__content {
      padding: 40px;
    }
    .article__photo {
      order: 2;
    }
    .article__image {
      width: 400px;
      max-width: 90%;
    }
    .article__footer {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      padding: 30px;
    }
  }

    </style>
</head>
<section class="py-5" id="book" style="background-image: url('assets/img/bluelight.png'); background-attachment: fixed;">
                  <center>  <h2><b>ABOUT US</b></h2> </center>

            <div class="container">

    <article class="article">
      <div class="article__content">
        <div class="article__title">
            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=rgp resort&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">format json</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div><br>
            <h4>STRIKE RGP RESORT</h4>
            <h6 style="text-align: justify;">
            Strike RGP Resort is one of the popular Monument located in Narra St., Phase 4, Soldiers Hills 4, Molino 6 Bacoor Cavite ,Bacoor listed under Landmark & Historical Place in Bacoor, Cavite Philippines.</h6>        
        </div>
      </div>
    </article>
    
    
    <article class="article">
      <div class="article__content">
        <div class="article__title">
            <h6 style="text-align: justify;">
            The safety of the guests at Strike RGP Resort is one of the most essential criteria that determine the quality and hospitality of a high-end resort. At RGP Resort, your safety is our main priority, and we use the most advanced technologies to keep you safe Room service is arranged as a section inside the food and beverage department of high-end resort facilities. Room service or in-room dining is a resort service enabling guests to choose items of food and drink for delivery to their hotel room for consumption Room service is organized as a subdivision within the food and beverage department of high-end resort properties. The RGP strike resort was formerly known as the "hidden paradise" of Bacoor. The management team of Strike RGP Resort assumed responsibility for Hidden Paradise, the best resort in Bacoor, and it is located in Soldiers IV, 4102 Bacoor, and Cavite City. The resort has good facilities and comfortable rooms to stay in. There are only four rooms and thirty-one cottages.</h6>        
        </div>
      </div>
    </article>
    
    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>MISSION</h4>
            <h6 style="text-align: justify;">
            We are dedicated on constantly providing enjoyable recreational activities, a safe environment and unforgettable vacation experience for every guest and every memeber of the staff. We will achieve this through excellence in service. Innovation and anticipation of our guest ever changing needs and expectations. The ability to fulfill this obligation will be reflected in our success, continued growth, on th accomplishtments of our resort and each individual.</h6>        
        </div>
      </div>
    </article>
    
       
    <article class="article">
      <div class="article__content">
        <div class="article__title">
          
            <h4>VISION</h4>
            <h6 style="text-align: justify;">
            The Strike RGP Resort established in the year of  2014 with an idea of providig a perfect getaway for guest who wants to experience a more relaxed and stress-free vacation. Strike RGP Resort is in Bacoor Cavite. With its complete facilities Strike RGP Resort is committed to ensure that quality service will be provided to theirs guests.</div>
      </div>
    </article>
    
    

   </div>

 </div>
  
        </section>

<!-- Footer-->
<?php require 'lib/footer.php'; ?>