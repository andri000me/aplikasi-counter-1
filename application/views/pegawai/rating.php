
<?php

	include 'menu.php';
?>
		 
		
<style>
* {
  box-sizing: border-box;
}

html,
body {
  height: 100%;
}

body {
  background: #F4F2F3;
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

h1 {
  font-family: 'Fjalla One', sans-serif;
  margin-bottom: 0.15rem;
}

h2 {
  font-family: 'Cutive Mono', 'Courier New';
  font-size: 1rem;
  letter-spacing: 1px;
  margin-bottom: 4rem;
}

label {
  cursor: pointer;
}

svg {
  width: 3rem;
  height: 3rem;
  padding: 0.15rem;
}


/* hide radio buttons */

input[name="star"] {
  display: inline-block;
  width: 0;
  opacity: 0;
  margin-left: -2px;
}

/* hide source svg */

.star-source {
  width: 0;
  height: 0;
  visibility: hidden;
}


/* set initial color to transparent so fill is empty*/

.star {
  color: transparent;
  transition: color 0.2s ease-in-out;
}


/* set direction to row-reverse so 5th star is at the end and ~ can be used to fill all sibling stars that precede last starred element*/

.star-container {
  display: flex;
  flex-direction: row-reverse;
  justify-content: center;
}

label:hover ~ label .star,
svg.star:hover,
input[name="star"]:focus ~ label .star,
input[name="star"]:checked ~ label .star {
  color: #d62a9d;
}

input[name="star"]:checked + label .star {
  animation: starred 0.5s;
}

input[name="star"]:checked + label {
  animation: scaleup 1s;
}

@keyframes scaleup {
  from {
    transform: scale(1.2);
  }
  to {
    transform: scale(1);
  }
}

@keyframes starred {
  from {
    color: #600040;
  }
  to {
    color: #d62a9d;
  }
}
</style>


<h1>Star Rating System</h1>
<h2>Terimakasih	atas	Ratingya  </h2>

<div class="star-source">
  <svg>
         <linearGradient x1="50%" y1="5.41294643%" x2="87.5527344%" y2="65.4921875%" id="grad">
            <stop stop-color="#bf209f" offset="0%"></stop>
            <stop stop-color="#d62a9d" offset="60%"></stop>
            <stop stop-color="#ED009E" offset="100%"></stop>
        </linearGradient>
    <symbol id="star" viewBox="153 89 106 108">   
      <polygon id="star-shape" stroke="url(#grad)" stroke-width="5" fill="currentColor" points="206 162.5 176.610737 185.45085 189.356511 150.407797 158.447174 129.54915 195.713758 130.842203 206 95 216.286242 130.842203 253.552826 129.54915 222.643489 150.407797 235.389263 185.45085"></polygon>
    </symbol>
</svg>

</div>
<form action="<?php echo base_url(). 'pegawai/rating'; ?>" method="post">

<div class="star-container">
<input type="hidden" name="no_transaksi" value="<?php	echo$no_transaksi	?>">
  <input type="radio" name="star" id="five"	value='5'>
  <label for="five">
    <svg class="star">
      <use xlink:href="#star"/>
    </svg>
  </label>
  <input type="radio" name="star" id="four"value='4'>
  <label for="four">
    <svg class="star">
      <use xlink:href="#star"/>
    </svg>
  </label>
  <input type="radio" name="star" id="three"value='3'>
  <label for="three">
    <svg class="star">
      <use xlink:href="#star"/>
    </svg>
  </label>
  <input type="radio" name="star" id="two"value='2'>
  <label for="two">
    <svg class="star">
      <use xlink:href="#star" />
    </svg>
  </label>
  <input type="radio" name="star" id="one"value='1'>
  <label for="one">
   <svg class="star">
    <use xlink:href="#star" />
   </svg>
  </label>

</div><br><br><br><center><button type="submit" class="btn btn-success	">Kasih	Star</button></center>
</form>

 <?php
	include 'footer.php';
 ?>
 