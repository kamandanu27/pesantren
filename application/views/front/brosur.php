<section
    class="elementor-section elementor-top-section elementor-element elementor-element-c2ec02a elementor-section-full_width elementor-section-height-default elementor-section-height-default"
    data-id="c2ec02a" data-element_type="section">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d6258aa"
                data-id="d6258aa" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-5c2c809 elementor--h-position-center elementor--v-position-middle elementor-arrows-position-inside elementor-pagination-position-inside elementor-widget elementor-widget-slides"
                            data-id="5c2c809" data-element_type="widget"
                            data-settings="{&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;transition&quot;:&quot;slide&quot;,&quot;transition_speed&quot;:500}"
                            data-widget_type="slides.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-swiper">
                                    <div class="elementor-slides-wrapper elementor-main-swiper swiper-container"
                                        dir="ltr" data-animation="fadeInUp">
                                        <div class="swiper-wrapper elementor-slides">
                                            <div class="elementor-repeater-item-f2d5390 swiper-slide">
                                                <div class="swiper-slide-bg"></div>
                                                <div class="elementor-background-overlay"></div>
                                                <div class="swiper-slide-inner">
                                                    <div class="swiper-slide-contents">
                                                        <div class="elementor-slide-heading">Profil</div>
                                                        <div class="elementor-slide-description">Pondok Pesantren
                                                            berbasis Teknologi dan Entrepreneur</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $no=1; foreach($data_brosur as $row_foto){?>
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-83b96fd elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="83b96fd" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c359ab3"
                data-id="c359ab3" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-9e7a55b elementor-widget elementor-widget-heading"
                            data-id="9e7a55b" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default"><?= $row_foto->keterangan_brosur ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section
    class="elementor-section elementor-top-section elementor-element elementor-element-39b7303 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="39b7303" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3d8cf05"
                data-id="3d8cf05" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-9126e12 elementor-widget elementor-widget-image"
                            data-id="9126e12" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image">
                                    <img width="768" height="615"
                                        src="<?= base_url()?>/public/image/upload/galeri_foto/<?= $row_foto->file_brosur ?>"
                                        class="attachment-medium_large size-medium_large" alt="alur ppdb online"
                                        loading="lazy" /> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>
