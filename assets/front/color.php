<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}

?>

.bg-light,
.table .thead-light th,
.blog-footer,
.dropdown-item:focus, .dropdown-item:hover,
.jumbotron,
.breadcrumb,
.page-item.active .page-link
{
background-color: <?php echo $color ?>!important;
}



.border-dark,
.table .thead-light th,
.page-item.active .page-link
{
border-color: #212529!important;
}

body {
background-color: #f0f8ff !important;
}
}

