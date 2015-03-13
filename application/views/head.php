<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>aa</title>



    <?php 
    $css = array(
      base_url('inc/css/bootstrap.min.css'),
      base_url('inc/css/bootstrap-responsive.min.css'),
      'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
      base_url('inc/css/font-awesome.css'),
      base_url('inc/css/style.css'),
      base_url('inc/css/pages/dashboard.css'),

    );

    $js = array(
      base_url('inc/js/jquery-1.7.2.min.js'),
      base_url('inc/js/excanvas.min.js'),
      base_url('inc/js/chart.min.js'),
      base_url('inc/js/bootstrap.js'),
      base_url('inc/js/base.js'),
    );


    
    foreach ($css as $key => $arq) {
    	echo '<link href="'.$arq.'" rel="stylesheet">'."\n"	;
    }

    foreach ($js as $key => $arq) {
      echo ' <script src="'.$arq.'" type="text/javascript"></script>'."\n"  ;
    }

    ?>
    <script src="<?php echo base_url("inc/js/tinymce/tinymce.min.js"); ?>"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
    $(document).ready(function(){   
      //Editor de texto     

       tinymce.init({
        selector: "textarea",
        height: "100ppx",
        theme: "modern",
        plugins: [
             "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
      }); 
});
</script>
</head>
<body>
