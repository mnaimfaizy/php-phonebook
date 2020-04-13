
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="MNF Phone Book" />

<!-- bootstarp-css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"  />
<link href="assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
<!--// bootstarp-css -->
<!-- css -->
<link rel="stylesheet" href="assets/css/dashboard.css" type="text/css" />
<!--<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />-->
<!--// css -->

<!-- jQuery DataTable CSS -->
<link rel="stylesheet" href="assets/DataTables/datatables.css" type="text/css" />

<style type="text/css">
.circle {
background-color: yellow;
border-radius: 50%;
width: 150px;
height: 150px;
text-align: center;
font-size: 50px;
color: #FFFFFF;
/* width and height can be anything, as long as they're equal */
}
/* Create the animation blocks */
@keyframes spin {
from { transform: rotate(0deg); }
to { transform: rotate(360deg); }
}

/* Spinning, gradient circle; CSS only! */
#advanced {
width: 150px;
height: 150px;

background-image: -moz-radial-gradient(45px 45px 45deg, circle cover, yellow 0%, red 100%, orange 95%);
background-image: -webkit-radial-gradient(45px 45px, circle cover, yellow, red);
background-image: radial-gradient(45px 45px 45deg, circle cover, yellow 0%, red 100%, yellow 95%);

animation-name: spin;
animation-duration: 3s; /* 3 seconds */
animation-iteration-count: infinite;
animation-timing-function: linear;
}

.custom_gradient_color {
  background: rgb(184,180,255);
  background: linear-gradient(90deg, rgba(184,180,255,1) 0%, rgba(171,255,240,1) 50%, rgba(130,122,255,1) 100%);
}

/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}
</style>
