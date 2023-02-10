<?php

session_start();

function include_social_links() {
    $output = '<ul class="shortcode-social-links"><li><a href="https://www.facebook.com/pittsburghrugby" target="_blank" ><span class="visually-hidden">Facebook</span><i class="fab fa-facebook"></i></a></li><li><a href="https://www.instagram.com/pittsburghrugby/" target="_blank" ><span class="visually-hidden">Instagram</span><i class="fab fa-instagram"></i></a></li><li><a href="https://twitter.com/pittsburghrugby" target="_blank" ><span class="visually-hidden">Twitter</span><i class="fab fa-twitter"></i></a></li></ul>';
    return $output;
}

add_shortcode('social_links', 'include_social_links');

/**
 * This function displays the validation messages, the success message, the container of the validation messages, and the
 * contact form.
 */
function display_contact_form() {

    $validation_messages = [];
    $success_message = '';

    ob_start();

    if ( isset($_POST['contact_form'])) {

        //Sanitize the data
        $visitor_name = isset( $_POST['visitor_name'] ) ? sanitize_text_field( $_POST['visitor_name'] ) : '';
        $visitor_email = isset( $_POST['visitor_email'] ) ? sanitize_text_field( $_POST['visitor_email'] ) : '';
        $concerned_department = isset( $_POST['concerned_department'] ) ? explode(':', $_POST['concerned_department']) : '';
        $visitor_message = isset( $_POST['visitor_message'] ) ? sanitize_textarea_field( $_POST['visitor_message'] ) : '';
        $email_body = "<div>";

        //Validate the data
        if ( strlen( $visitor_name ) === 0 ) {
            $validation_messages[] = 'Please enter a valid name.';
        } else {
            $email_body .= "<div><label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span></div>";
        }

        if ( strlen( $visitor_email ) === 0 or !is_email( $visitor_email ) ) {
            $validation_messages[] = 'Please enter a valid email address.';
        } else {
            $email_body .= "<div><label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span></div>";
        }

        if ( strlen( $visitor_message ) === 0 ) {
            $validation_messages[] = 'Please enter a valid message.';
        } else {
            $email_body .= "<div><label><b>Visitor Message:</b></label><div>".$visitor_message."</div></div>";
        }

        if ($_POST['captcha_challenge'] !== $_SESSION['captcha_text']) {
            $validation_messages[] = 'Entered captcha code did not match. Try Again.';
        }

        $email_body .= "</div>";

        //Send an email to the WordPress administrator if there are no validation errors
        if ( empty( $validation_messages ) ) {

            // $recipient    = get_option( 'admin_email' );
            // $recipient = 'achapm87@gmail.com';

            // Context List
            // general-inquiry
            // womens-membership
            // womens-matchsec
            // mens-membership
            // mens-matchsec

            switch ($concerned_department[0]) {
                case 'general-inquiry':
                    $recipient = 'club@pghrugby.com';
                    break;
                case 'womens-membership':
                    $recipient = 'womensmembership@pghrugby.com';
                    break;
                case 'womens-matchsec':
                    $recipient = 'womensmatchsec@pghrugby.com';
                    break;
                case 'mens-membership':
                    $recipient = 'mensmembership@pghrugby.com';
                    break;
                case 'mens-matchsec':
                    $recipient = 'mensmatchsec@pghrugby.com';
                    break;
                case 'website':
                    $recipient = 'web@pghrugby.com';
                    break;
                default:
                    $recipient = 'club@pghrugby.com';
            }

            $subject = 'Website Message - From: ' . $visitor_name;
            $headers = array(
                'MIME-Version: 1.0',
                'Content-Type: text/html; charset=UTF-8',
                'From: '. $visitor_name. ' <' . $visitor_email . '>',
                'Reply-To: ' . $visitor_name . ' <' . $visitor_email . '>'
            );

            wp_mail( $recipient, $subject, $email_body, $headers );

            $success_message = 'Your message has been successfully sent.';

        }

    }

    if (!empty($validation_messages) || strlen($success_message) > 0) {
?>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="contact-form-messaging">
    <?php
        //Display the validation errors
        if (!empty($validation_messages)) {
            foreach ( $validation_messages as $validation_message ) {
                echo '<div class="contact-form-message contact-validation-message">' . esc_html( $validation_message ) . '</div>';
            }
        }

        //Display the success message
        if (strlen($success_message) > 0) {
            echo '<div class="contact-form-message contact-success-message">' . esc_html( $success_message ) . '</div>';
        }
    ?>

            </div>
        </div>
    </div>
<?php
    }
?>
    <div class="row">
        <div class="col-12 col-md-6">
            <form id="contact-form" class="needs-validation mb-4" action="<?php echo esc_url( get_permalink() ); ?>" method="post" novalidate>
                <input type="hidden" name="contact_form">

                <div class="form-group mb-3 required">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} value="<?php echo isset($visitor_name) && strlen($success_message) == 0 ? $visitor_name : '' ?>" required>
                    <div class="invalid-feedback">Please input a name.</div>
                </div>

                <div class="form-group mb-3 required">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="visitor_email" placeholder="john.doe@email.com" value="<?php echo isset($visitor_email) && strlen($success_message) == 0 ? $visitor_email : '' ?>" required>
                    <div class="invalid-feedback">Please input an email.</div>
                </div>

                <div class="form-group mb-3 required">
                    <label for="department-selection" class="form-label">Context for Message</label>
                    <select class="form-select" id="department-selection" name="concerned_department" required>
                        <?php if (isset($concerned_department) && strlen($success_message) == 0) { ?>
                            <option selected value="<?php echo $concerned_department[0].':'.$concerned_department[1] ?>"><?php echo $concerned_department[1] ?></option>
                        <?php } else { ?>
                            <option selected disabled value="">Select...</option>
                        <?php } ?>
                        <optgroup label="General">
                            <option value="general-inquiry:General Club Inquiry">General Club Inquiry</option>
                        </optgroup>
                        <optgroup label="Membership">
                            <option value="womens-membership:Women's Team Membership">Women's Team Membership</option>
                            <option value="mens-membership:Men's Team Membership">Men's Team Membership</option>
                        </optgroup>
                        <optgroup label="Match Scheduling">
                            <option value="womens-matchsec:Women's Match Secretary">Women's Match Secretary</option>
                            <option value="mens-matchsec:Men's Match Secretary">Men's Match Secretary</option>
                        </optgroup>
                        <optgroup label="Website">
                            <option value="website:Website Question or Technical Issue">Website Question or Technical Issue</option>
                        </optgroup>
                    </select>
                    <div class="invalid-feedback">Please select message context.</div>
                </div>

                <div class="form-group mb-3 required">
                    <label for="visitor_message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="visitor_message" rows="7" placeholder="What's up?" required><?php echo isset($visitor_message) && strlen($success_message) == 0 ? $visitor_message : '' ?></textarea>
                    <div class="invalid-feedback">Please input a message.</div>
                </div>

                <div class="form-group mb-3 required">
                    <label for="captcha" class="form-label">Please Enter the Captcha Code</label>
                    <br/>
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/contact/captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
                    <br/>
                    <input class="form-control" type="text" id="captcha" name="captcha_challenge" placeholder="Enter Captcha Code" oninput="this.value = this.value.toUpperCase()" pattern="[A-Z\sa-z]{6}" required>
                    <div class="invalid-feedback">Incorrect Captcha.</div>
                </div>

                <input type="submit" id="contact-form-submit" class="btn btn-primary" value="Submit">

            </form>
        </div>
    </div>

<?php

    $output = ob_get_clean();
    // print $output; // debug
    return $output;

}

add_shortcode( 'contact-us-form', 'display_contact_form' );

?>