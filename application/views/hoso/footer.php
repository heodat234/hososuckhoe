<footer id="footer" class="clear" data-ng-include="'<?php echo base_url() ?>hoso/app/layout/views/footer.html'">
    <div data-ng-controller="FooterCtrl as footerVM">
        <div class="visible-spectrum-block">
            <p class="pull-left fix-position">© 2017 Spectrum Health &amp; Priority Health <span ng-show="footerVM.partnerBrandingEnabled()" class="">| <a class="partner" href="#/about/partners" analytics-on="" analytics-event="#/about/partners" analytics-category="Link" analytics-label="/welcome" analytics-value="Partners">Partners</a></span></p>
            <!----><img src="<?php echo base_url() ?>hoso/assets/images/cobrand-logos-footer.png" alt="Spectrum and Priority Logos" class="footer-logo" ng-if="currentUser.uiExperience !== 'green'">
            <!---->
        </div>
        <div class="visible-priority-block">
            <div class="text-center">© 2017 Priority Health a Michigan company.
                <ul class="list-inline" role="navigation">
                    <li><a href="#/pages/terms-of-use" analytics-on="" analytics-event="#/pages/terms-of-use" analytics-category="Link" analytics-label="/welcome" analytics-value="Terms of use">Terms of use</a></li>
                    <li><a href="#/pages/privacy-policy" analytics-on="" analytics-event="#/pages/privacy-policy" analytics-category="Link" analytics-label="/welcome" analytics-value="Privacy policy">Privacy policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>