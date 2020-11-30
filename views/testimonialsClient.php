<div class="heroblue">
    <div class="margins">
        <div class="testimonialcard"> 
                    <h1 class="Theading">Reviews</h1>
                    <div class="reviews">   
                         <div class="slide heroslide">  
                        <?php
                        if(isset($this->oReviews)){
                        foreach ($this->oReviews as $review){                         
                        ?>                                           
                            <div class="revimg"><img src="<?=$review->image?>" alt="Our patch from a happy client <?=$review->image?>"></div>

                            <div class="review">
                                <h2><?=$review->username?></h2>
                                <p><?=$review->strDescription?></p>
                            </div>
                            <?php
                            }
                        }
                        ?>
                        </div><!--.slide-->

                    </div><!--end of reviews-->
        </div><!--testimonial card-->
    </div><!--.margins-->
</div><!--.heroblue-->