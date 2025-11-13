<div id="about" class="bg_A01D10 topAbout bgTopAbout">
    <!--
    bg:../img/bgTopAboutPc.png
    -->
    <div class="topAboutLxn">
        <div class="d_flex j_between topAboutInfo">
            <section class="titleTopAbout">
                <h2 class="cl_282828 fw_800 h2TopAbout">どんなお店？</h2>
                <div class="bg_fff brdTopAbout"></div>
                <p class="cl_282828 fw_800 en rybyTopAbout">About</p>
            </section>
            <p class="cl_282828 fw_500 text_justify txtMainAboutInfo"><?php echo scf::get('txtAboutTxt'); ?></p>
        </div>

        <div class="d_flex j_between topAboutTentyo">
            <section class="secAboutTentyo">
                <h3 class="cl_282828 fw_800 h3AboutTentyo"><?php echo scf::get('nameTentyo'); ?></h3>
                <p class="cl_282828 fw_500 text_justify txtAboutTentyo"><?php echo scf::get('txtTencho'); ?></p>
                <?php if (!empty(scf::get('thTentyoInfo')[0])): ?>
                    <ul class="ulAboutTentyo">
                        <?php foreach (scf::get('tableTentyoInfo') as $fields): ?>
                            <?php if (!empty($fields['thTentyoInfo'])): ?>
                                <li class="d_flex j_between liAboutTencho">
                                    <h4 class="cl_282828 fw_500 h4AboutTencho"><?php echo $fields['thTentyoInfo']; ?></h4>
                                    <div class="cl_282828 fw_500 dottoAboutTencho">：</div>
                                    <p class="cl_282828 fw_500 text_justify texAboutTencho"><?php echo $fields['tdTentyoInfo']; ?></p>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </section>
        </div>

        <?php if (!empty(scf::get('iframeTentyo'))): ?>
            <div class="pore iframeTentyo">
                <?php echo scf::get('iframeTentyo'); ?>
            </div>
        <?php endif; ?>

        <ul class="d_flex j_start row ulAboutTentyo">
            <?php foreach (scf::get('shopSaff') as $fields): ?>
                <?php $img = get_scf_img_loop_url_id($fields['imgStaffs']); ?>
                <?php if (!empty($img[0])): ?>
                    <li class="liAboutTentyo">
                        <a class="btnAboutTentyo" href="<?php echo $img[0]; ?>" data-lightbox="image-1" data-title="<?php echo $fields['nameStaff']; ?> ">
                            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo $fields['nameStaff']; ?>についての画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                            <figure class="iconAboutTentyo">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_1320_1840" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                        <rect width="20" height="20" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_1320_1840)">
                                        <rect width="20" height="20" fill="white" />
                                        <path d="M3.33398 16.6668V12.5002H4.16732V15.2437L7.16732 12.2437L7.75711 12.8335L4.75711 15.8335H7.50065V16.6668H3.33398ZM12.5007 16.6668V15.8335H15.2442L12.2442 12.8335L12.834 12.2437L15.834 15.2437V12.5002H16.6673V16.6668H12.5007ZM7.16732 7.75662L4.16732 4.75662V7.50016H3.33398V3.3335H7.50065V4.16683H4.75711L7.75711 7.16683L7.16732 7.75662ZM12.834 7.75662L12.2442 7.16683L15.2442 4.16683H12.5007V3.3335H16.6673V7.50016H15.834V4.75662L12.834 7.75662ZM10.0007 11.106C9.69662 11.106 9.43628 10.9977 9.21961 10.7812C9.00308 10.5645 8.89482 10.3042 8.89482 10.0002C8.89482 9.69614 9.00308 9.43579 9.21961 9.21912C9.43628 9.00259 9.69662 8.89433 10.0007 8.89433C10.3047 8.89433 10.565 9.00259 10.7817 9.21912C10.9982 9.43579 11.1065 9.69614 11.1065 10.0002C11.1065 10.3042 10.9982 10.5645 10.7817 10.7812C10.565 10.9977 10.3047 11.106 10.0007 11.106Z" fill="#282828" />
                                    </g>
                                </svg>
                            </figure>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <div class="d_flex j_between topAboutTentyo topAboutTentyo02">
            <section class="secAboutTentyo">
                <h3 class="cl_282828 fw_800 h3AboutTentyo"><?php echo scf::get('subH3Tencho'); ?></h3>
                <p class="cl_282828 fw_500 text_justify txtAboutTentyo"><?php echo scf::get('subTxtTencho'); ?></p>
            </section>
        </div>
    </div>
</div>