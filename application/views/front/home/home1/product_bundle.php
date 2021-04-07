<!-- PAGE -->
<section class="page-section featured-products sl-bundled">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-title section-title-lg">
                            <span>
                                <span class="thin"> <?php echo translate('bundled_products');?></span>
                            </span>
                        </h2>
                        <div class="featured-products-carousel">
                            <div class="owl-carousel-2" id="most-viewed-carousel">
                                <?php
                                    $box_style =  $this->db->get_where('ui_settings',array('ui_settings_id' => 42))->row()->value;
                                    $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 41))->row()->value;
                                    $product_bundle=$this->crud_model->product_list_set('bundle',$limit);
                                    //$product_bundle= $this->db->get_where('product', array('is_bundle' => 'yes'))->result_array();
                                    foreach($product_bundle as $row){
                                        echo $this->html_model->product_box($row, 'grid', $box_style);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
<!-- /PAGE -->
<script>
	function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
        }
}   
    //     $(document).ready(function(){
        docReady(function() {
    // $(".owl-carousel-2").owlCarousel({
    //     autoplay: true,
    //     loop: true,
    //     margin: 30,
    //     dots: false,
    //     nav: true,
    //     navText: [
    //         "<i class='fa fa-angle-left'></i>",
    //         "<i class='fa fa-angle-right'></i>"
    //     ],
    //     responsive: {
    //         0: {items: 2},
    //         479: {items: 2},
    //         768: {items: 2},
    //         991: {items: 5},
    //         1024: {items: 5}
    //     }
    // });
    set_bundled_product_box_height();
});

function set_bundled_product_box_height(){
    var max_title = 0;
    var slBundled = document.querySelectorAll('.sl-bundled .caption-title');

    slBundled.forEach(function(element, index) {
    // $('.sl-bundled .caption-title').each(function(){

        
        // var current_height= parseInt($(this).css('height'));
        var current_height= parseInt(element.style.height);
        if(current_height >= max_title){
            max_title = current_height;
        }
    if (max_title > 0) {
        element.style.height = max_title; 
    }
    });
    // if (max_title > 0) {
    //     $('.sl-bundled .caption-title').css('height',max_title);
    // }
}
</script>