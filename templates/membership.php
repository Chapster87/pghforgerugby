<div class="modal fade" id="venmoModal" tabindex="-1" aria-labelledby="venmoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="venmoModalLabel">Venmo Payment Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>How to Pay with Venmo</h2>
                <p>Follow these steps to pay with Venmo:</p>
                <ol>
                    <li>
                        <div class="d-flex flex-column">
                            <p class="mb-2"><a class="link-secondary" href="https://venmo.com/pghrugby" target="_blank">Open Venmo by clicking here</a>, or scanning the following QR code:</p>
                            <div class="d-flex justify-content-center mb-3">
                                <a href="https://venmo.com/pghrugby" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-qr.png" alt="Venmo Logo" width="200">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>Verify that @pghrugby is the recipient</li>
                    <li>
                        <div class="d-flex flex-column">
                            <p class="mb-2">Enter the donation amount you wish to contribute and the reason for payment: i.e.<strong>Club Membership - Reward Tier</strong></p>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-amount-and-desc.png" alt="Venmo Payment Details" width="250">
                            </div>
                        </div></li>
                    <li>
                        <div class="d-flex flex-column">
                            <p class="mb-2">If you would like to make a recurring payment, tap the "Schedule" button in the bottom left. Then choose a frequency & occurs date. Tap "Save" when finished.</p>
                            <div class="row mb-3">
                                <div class="col-12 col-sm-6">
                                    <img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-schedule1.png" alt="Venmo Schedule Payment">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <img class="d-block mt-3 mt-sm-0" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-schedule2.png" alt="Venmo Schedule Payment">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>Click "Pay" to complete the transaction</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="membership container inner mt-4">
    <div class="membership-tier diamond row">
        <div class="col-12">
            <div class="tier-header row">
                <div class="col-12">
                    <h3>Diamond Membership</h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tier-body row">
                <div class="tier-contribution tier-col col-12 col-md-6 col-xl-3">
                    <div class="tier-contribution-inner">
                        <span class="tier-contribution-label tier-col-label">Annual Donation: </span>
                        <span class="tier-contribution-amount">$250/month or $2,500/year</span>
                    </div>
                </div>
                <div class="tier-benefits tier-col col-12 col-md-6 col-xl-5">
                    <div class="tier-benefits-inner">
                        <span class="tier-benefits-label tier-col-label">Benefits: </span>
                        <ul>
                            <li>Spotlight media feature</li>
                            <li>Name engraved on NEW plaque at Ruggers Pub</li>
                            <li>Complementary reserved seating for FOUR at Annual Awards Gala</li>
                            <li>SC7s Field Naming Rights</li>
                        </ul>
                    </div>
                </div>
                <div class="tier-payment tier-col d-flex flex-column col-12 col-xl-4">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center">
                        <input name="cmd" type="hidden" value="_s-xclick" />
                        <input name="hosted_button_id" type="hidden" value="L7AR7NVRAN8YJ" />
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="on0" type="hidden" value="Diamond Club Membership" />
                                        Diamond Club Membership
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="os0">
                                            <option value="Month">Month : $250.00 USD - monthly</option>
                                            <option value="Year">Year : $2,500.00 USD - yearly</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input name="currency_code" type="hidden" value="USD" />
                        <input class="paypal-submit" alt="PayPal - The safer, easier way to pay online!" name="submit" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/donate-paypal.webp" type="image" />
                        <img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
                    </form>
                    <div class="w-100 text-center py-2"><span class="">OR</span></div>
                    <button type="button" class="venmo-btn border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#venmoModal">
                        <img class="venmo-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-logo.webp" alt="Pay With Venmo" width="200">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="membership-tier platinum row">
        <div class="col-12">
            <div class="tier-header row">
                <div class="col-12">
                    <h3>Platinum Membership</h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tier-body row">
                <div class="tier-contribution tier-col col-12 col-md-6 col-xl-3">
                    <div class="tier-contribution-inner">
                        <span class="tier-contribution-label tier-col-label">Annual Donation: </span>
                        <span class="tier-contribution-amount">$100/month or $1,000/year</span>
                    </div>
                </div>
                <div class="tier-benefits tier-col col-12 col-md-6 col-xl-5">
                    <div class="tier-benefits-inner">
                        <span class="tier-benefits-label tier-col-label">Benefits: </span>
                        <ul>
                            <li>Spotlight media feature</li>
                            <li>Golf Outing Signage Recognition</li>
                            <li>Name engraved on plaque at Ruggers</li>
                        </ul>
                    </div>
                </div>
                <div class="tier-payment tier-col d-flex flex-column col-12 col-xl-4">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center">
                        <input name="cmd" type="hidden" value="_s-xclick" />
                        <input name="hosted_button_id" type="hidden" value="GWYMGW3F6AH9C" />
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="on0" type="hidden" value="Platinum Club Membership" />
                                        Platinum Club Membership
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="os0">
                                            <option value="Month">Month : $100.00 USD - monthly</option>
                                            <option value="Year">Year : $1,000.00 USD - yearly</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input name="currency_code" type="hidden" value="USD" />
                        <input class="paypal-submit" alt="PayPal - The safer, easier way to pay online!" name="submit" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/donate-paypal.webp" type="image" />
                        <img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
                    </form>
                    <div class="w-100 text-center py-2"><span class="">OR</span></div>
                    <button type="button" class="venmo-btn border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#venmoModal">
                        <img class="venmo-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-logo.webp" alt="Pay With Venmo" width="200">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="membership-tier gold row">
        <div class="col-12">
            <div class="tier-header row">
                <div class="col-12">
                    <h3>Gold Membership</h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tier-body row">
                <div class="tier-contribution tier-col col-12 col-md-6 col-xl-3">
                    <div class="tier-contribution-inner">
                        <span class="tier-contribution-label tier-col-label">Annual Donation: </span>
                        <span class="tier-contribution-amount">$50/month or $500/year</span>
                    </div>
                </div>
                <div class="tier-benefits tier-col col-12 col-md-6 col-xl-5">
                    <div class="tier-benefits-inner">
                        <span class="tier-benefits-label tier-col-label">Benefits: </span>
                        <ul>
                            <li>Newsletter recognition</li>
                            <li>Complementary reserved seats for TWO at Annual Awards Gala</li>
                        </ul>
                    </div>
                </div>
                <div class="tier-payment tier-col d-flex flex-column col-12 col-xl-4">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center">
                        <input name="cmd" type="hidden" value="_s-xclick" />
                        <input name="hosted_button_id" type="hidden" value="7G6PKQ4VKZCAW" />
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="on0" type="hidden" value="Gold Club Membership" />
                                        Gold Club Membership
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="os0">
                                            <option value="Month">Month : $50.00 USD - monthly</option>
                                            <option value="Year">Year : $500.00 USD - yearly</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input name="currency_code" type="hidden" value="USD" />
                        <input class="paypal-submit" alt="PayPal - The safer, easier way to pay online!" name="submit" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/donate-paypal.webp" type="image" />
                        <img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
                    </form>
                    <div class="w-100 text-center py-2"><span class="">OR</span></div>
                    <button type="button" class="venmo-btn border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#venmoModal">
                        <img class="venmo-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-logo.webp" alt="Pay With Venmo" width="200">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="membership-tier silver row">
        <div class="col-12">
            <div class="tier-header row">
                <div class="col-12">
                    <h3>Silver Membership</h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tier-body row">
                <div class="tier-contribution tier-col col-12 col-md-6 col-xl-3">
                    <div class="tier-contribution-inner">
                        <span class="tier-contribution-label tier-col-label">Annual Donation: </span>
                        <span class="tier-contribution-amount">$25/month or $250/year</span>
                    </div>
                </div>
                <div class="tier-benefits tier-col col-12 col-md-6 col-xl-5">
                    <div class="tier-benefits-inner">
                        <span class="tier-benefits-label tier-col-label">Benefits: </span>
                        <ul>
                            <li>Newsletter recognition</li>
                        </ul>
                    </div>
                </div>
                <div class="tier-payment tier-col d-flex flex-column col-12 col-xl-4">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center">
                        <input name="cmd" type="hidden" value="_s-xclick" />
                        <input name="hosted_button_id" type="hidden" value="FE3GE9UXNR46E"/>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="on0" type="hidden" value="Silver Club Membership" />
                                        Silver Club Membership
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="os0">
                                            <option value="Month">Month : $25.00 USD - monthly</option>
                                            <option value="Year">Year : $250.00 USD - yearly</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input name="currency_code" type="hidden" value="USD" />
                        <input class="paypal-submit" alt="PayPal - The safer, easier way to pay online!" name="submit" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/donate-paypal.webp" type="image" />
                        <img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
                    </form>
                    <div class="w-100 text-center py-2"><span class="">OR</span></div>
                    <button type="button" class="venmo-btn border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#venmoModal">
                        <img class="venmo-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-logo.webp" alt="Pay With Venmo" width="200">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="membership-tier bronze row">
        <div class="col-12">
            <div class="tier-header row">
                <div class="col-12">
                    <h3>Bronze Membership</h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tier-body row">
                <div class="tier-contribution tier-col col-12 col-md-6 col-xl-3">
                    <div class="tier-contribution-inner">
                        <span class="tier-contribution-label tier-col-label">Annual Donation: </span>
                        <span class="tier-contribution-amount">$15/month or $150/year</span>
                    </div>
                </div>
                <div class="tier-benefits tier-col col-12 col-md-6 col-xl-5">
                    <div class="tier-benefits-inner">
                        <span class="tier-benefits-label tier-col-label">Benefits: </span>
                        <ul>
                            <li>Newsletter recognition</li>
                        </ul>
                    </div>
                </div>
                <div class="tier-payment tier-col d-flex flex-column col-12 col-xl-4">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center">
                        <input name="cmd" type="hidden" value="_s-xclick" />
                        <input name="hosted_button_id" type="hidden" value="S3QE9J6LTWR3N" />
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="on0" type="hidden" value="Bronze Club Membership" />
                                        Bronze Club Membership
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="os0">
                                            <option value="Month">Month : $15.00 USD - monthly</option>
                                            <option value="Year">Year : $150.00 USD - yearly</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input name="currency_code" type="hidden" value="USD" />
                        <input class="paypal-submit" alt="PayPal - The safer, easier way to pay online!" name="submit" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/donate-paypal.webp" type="image" />
                        <img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
                    </form>
                    <div class="w-100 text-center py-2"><span class="">OR</span></div>
                    <button type="button" class="venmo-btn border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#venmoModal">
                        <img class="venmo-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/venmo/venmo-logo.webp" alt="Pay With Venmo" width="200">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>