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
                  <center>  <h2><b>TERMS AND CONDITIONS</b></h2> </center>

            <div class="container">
            
  <div class="articles">
    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>The following terms and conditions are strictly implemented for check-in guests:</h4><br>
            <h6 style="text-align: justify;">
            1. Wear Your Facemask. Please cover your nose & mouth prior to entering.<br><br>
            2. Temperature check. Please let the staff check your temperature before entering.<br><br>
            3. 6 FEET. Social Distancing. Please practice Social Distancing.<br><br>
            4. The resort is only authorized to accommodate properly registered guests. For this purpose, guests are to present their valid national ID card or passport, or any other valid proof of identity to the relevant hotel front desk employee.<br><br>
            5. Settlement of bills: Bills must be settled upon arrival either by payment in cash or valid credit cards, cheques are not accepted.<br><br>
            6. Guests are to use their rooms for the agreed period. If the guest breaks their stay, money will not be refunded.<br><br>
            7. Guests are to use their rooms for the agreed period. If the period of accommodation is not stipulated in advance, guests are to check out by 11:00AM on the last day of their stay at the latest, and they are obliged to have vacated the room by this time.<br><br>
            8. Be advised to keep valuables in your personal rooms. Keep your doors lock closed when not in the room or when you are sleeping. We have a permanent guard in the hotel but he can’t see all rooms at the same time. The hotel will not in any whatsoever, be responsible for the loss of guests belongings or any other property.<br><br>
            9. WE LOVE PETS, But they aren't allowed inside the resort.<br><br>
            </h6>
         
        </div>
      </div>
    </article>


    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>Rebooking Policy:</h4>
            <h6 style="text-align: justify;">
            Re-booking must be done 15 working days prior to date of arrival, otherwise re-booking may not be permitted.</h6>
         
        </div>
      </div>
    </article>


   </div>

 </div>
  
        </section>