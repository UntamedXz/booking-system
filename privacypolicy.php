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
                  <center>  <h2><b>PERSONAL DATA PRIVACY & SECURITY POLICY</b></h2> </center>

            <div class="container">

  <div class="articles">
    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>Collection of Personal Information</h4>
            <h6 style="text-align: justify;">
The term “personal data” in this Policy refers to personal information which we, in the process of providing you with a particular service, may ask you to voluntarily supply to us.  The types of personal data we process include: name, title, gender, contact details (including but not limited to email address, mailing address, mobile phone number, telephone number and fax number etc.); date and place of birth, nationality, passport number, identification number and visa information; credit card information including name of cardholder, credit card number and expiry date; loyalty program membership information, online user account details, profile or password details and any frequent flyer or travel partner program affiliation; any information necessary to fulfill special requests on hotel arrangement; information you provide regarding your marketing preferences or in the course of participating in surveys, contests or promotional offers; information collected through the use of closed circuit television systems, card key and other security systems; contact and other relevant details concerning the employees of corporate accounts and vendors and other individuals with whom we do business (e.g., travel agents or meeting and event planners); and in limited cases, information relating to the credit of customers.</h6>
         
        </div>
      </div>
    </article>


    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>Data we collect and how we use it:</h4>
            <h6 style="text-align: justify;">
            
When you request a particular service from us or otherwise interact with Strike RGP Resort, we will ask you to voluntarily provide us with Data that we need. For example, if you would like us to make a reservation at one of our hotels, we will request for Data such as your name, address, telephone number, e-mail address and credit card information for payment purposes (including credit card number, code and expiry date). We will use your e-mail address to send an e-mail confirmation of your booking and a pre-arrival message summarizing your confirmation details and preferences. Such pre-arrival message will include other information about the hotel, the area and the weather.</h6>
         
        </div>
      </div>
    </article>

    
    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>Browsing</h4>
            <h6 style="text-align: justify;">
When you browse this website, we do not collect Data unless you voluntarily and knowingly provide it to us, for example by accessing our website from a link in an e-mail that we send to you or where you have created a profile under Strike RGP Resort and you log-in to your account.</h6>
         
        </div>
      </div>
    </article>

    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>Our Commitment to Data Security</h4>
            <h6 style="text-align: justify;">
To maintain the accuracy of your personal data, as well as preventing unauthorized access to and ensuring the correct use of your personal data, we have carried out appropriate physical, electronic and managerial measures to safeguard and secure the personal data we collect. These measures are subject to ongoing review and monitoring. Whilst we make every effort to protect your personal data, no security measures can guarantee that your personal data and information will not be subject to interference, misuse or hacking and we shall not be responsible for any loss, misuse or alteration arising as a result of such incidents.</h6>
         
        </div>
      </div>
    </article>


    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>How long will Data be retained for?</h4>
            <h6 style="text-align: justify;">
Your Data will be stored for the period of time required or permitted by law in the jurisdiction of the operation holding the information.</h6>
         
        </div>
      </div>
    </article>

   </div>

 </div>
  
        </section>