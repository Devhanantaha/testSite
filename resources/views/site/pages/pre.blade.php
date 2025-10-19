<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	    <title>@yield('title') - {{ config('app.name') }}</title>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
background: rgba(0,0,0,.2);
    border: 1px solid #fff;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: Droid Arabic Naskh, mango-regular,Arial;
    font-size: 11px;
    letter-spacing: normal;
    line-height: 38px;
    margin: 0;
    min-height: 38px;
    padding: 0;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    float: left;
    width: 155px;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
.hero-text button a {
color:#fff}
</style>
</head>
<body>
<div class="hero-image" style="background: #061822;">
  <div class="hero-text">
    <img src="/images/ftgc.png" alt="ftg" >
    <p>
        FTG is an Egyptian Joint Stock Company to provide a set of integrated solutions in many diverse fields Engineering Industry, Trading, Contacting, Training and Consultation.<br>
        FTG basically established as a manufacture company since 1990, specialized in Electronic and Electrical industry as well as energy saving technology with brand Falcon.<br>
        Falcon for Electrical Contracting to supply and install all electrical products include electrical distribution design and lighting distribution design.<br>
        Falcon for Training and Consultations to provide a unique service in training and consultation for developing skills in many fields of Engineering, Technology and Management.<br>
        
        
    </p>
  <ul>
    <i>
      <a href="/en">
        <img src="/images/falconc.png" alt="">
      </a>
    </i>
    <i>
      <a href="#">
        <img src="/images/ftgc.png" alt="" style="cursor: not-allowed;">
      </a>
    </i>
  </ul>
  </div>
</div>
</body>
</html>