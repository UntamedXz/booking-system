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

<center>  <h2><b>PAALALA / REMINDERS</b></h2> </center>




<div class="container">

<div class="articles">
  
  <article class="article">
    <div class="article__content">
      <div class="article__title">
          <h6 style="text-align: justify;">
          
1. Mahigpit pong ipinagbabawal ang mga kasuotang gaya ng dark colored t-shirt, maong na may zipper at shorts na may butones.proper swimming attire po lang ang nararapat
<br><br>
2.bantayan pong mabuti ang mga bata at huwag hayaang maligo sa pool ng mag-isa para maiwasan ang anumang kapahamakan.
<br><br>
3.Pag-ingatan po ang mga personal na gamit gaya ng cellphone, camera walang pananagutan sa pagkasira at pera alahas atbp ang strike rgp resort po ay walang pananagutan sa anumang maaaring mawala.
<br><br>
4.Bawal po ang hard drinks at sobrang inuman para maiwasan ang gulo.
<br><br>
5. No vandalism. Fine-php 500
<br><br>
6. Sa ganap na 5:00 hanggang 6:00 ng hapon ay maaari po lamang na wala muna maliligo ng pool dahil mag lilinis muna
<br><br>
7. Bawal po maligo ang may sugat at may sakit sa balat para sa kapahamakan ng ibang naliligo.
<br><br>
8. Mag shower po muna bago maligo sa pool.
<br><br>
9. Bawal po maglaro magtulukan at mag dive na wala sa lugar para sa maiwasan ang aksidente
<br><br>
10. I-park at i lock po ng mabuti ang inyong sasakyan ang resort po ay walang pananagutan sa pag ka sira at pagkawala ng gamit at sasakyan.

</h6>
       
      </div>
    </div>

 </div>

</div>


                  <center>  <h2><b>PLEASE FOLLOW! PROPER SWIMMING ATTIRE</b></h2> </center>

            <div class="container">

  <div class="articles">
    
    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>ALLOWED:</h4><BR>
            <h6 style="text-align: justify;">
            > SWIM SUIT<BR><BR>
            > BOARD SHORTS<BR><BR>
            > WET SUIT/RASH GUARD<BR><BR>
            > MUSLIMAH SWIMWEAR<BR><BR>
</h6>
         
        </div>
      </div>
    </article>

    <div class="articles">
    
    <article class="article">
      <div class="article__content">
        <div class="article__title">
      
            <h4>NOT ALLOWED:</h4><BR>
            <h6 style="text-align: justify;">
            > WITH DIAPERS/NAPKINS<BR><BR>
            > DENIM/LONG SHORTS<BR><BR>
            > CLOTHES WITH ZIPPER OR BUTTONS<BR><BR>
            > DARK COLORED SHIRTS<BR><BR>
            > SAREE<BR><BR>
</h6>
         
        </div>
      </div>
    </article>

   </div>

 </div>
  
        </section>