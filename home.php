<?php
/**
/* Template Name: Home
 *
 * Displays Only Home template
 *
 * @package WordPress
 * @subpackage website
 * @since website 1.0
 */

 get_header(); ?>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('<?php echo esc_url(get_template_directory_uri());?>/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-lg-6 col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Welcome to our PMC <br><span><?php echo date ('Y-m-d');?> </span></h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="icon-calendar mr-2"></span>Visit us - 2nd floor Batian Building Nyeri Town</p>
            <div id="timer" class="d-flex">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
						</div>
          </div>
          <div class="col-lg-2 col"></div>
<div class="col-lg-4 col-md-6 mt-0 mt-md-5">
    <form action="<?php echo esc_url(home_url('/')); ?>" class="request-form ftco-animate" method="post">
        <input type="hidden" name="action" value="handle_conference_registration_form">
        <h2>Join Our upcoming Events </h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Name" name="name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Email" name="email" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Phone" name="phone" required>
        </div>
        <div class="form-group">
            <select class="form-control" name="event_select" id="event_select" required>
                <option value="" disabled selected>Select your Event</option>
                <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'event';
                $query = "SELECT * FROM $table_name";
                $events = $wpdb->get_results($query);

                // Loop through events and populate the dropdown
                foreach ($events as $event) {
                    echo '<option value="' . esc_attr($event->id) . '">' . esc_html($event->event_title) . ' - ' . esc_html($event->event_date) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label><input type="checkbox" value="" class="mr-2" name="terms_accepted" required> I have read and accept the terms and conditions</label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="form_submit" value="Join now" class="btn btn-primary py-3 px-4">
        </div>
    </form>
</div>


        </div>
      </div>
    </div>

    <section class="ftco-section services-section bg-primary">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span ></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Project Planning</h3>
                <p>Our Project Management helps in defining project goals, objectives, scope, and deliverables. We assist in creating a comprehensive project plan, outlining the tasks, timelines, and resource requirements.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span ></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Risk Management</h3>
                <p> We identify potential risks that may impact the project and develop strategies to mitigate or manage these risks. This involves creating contingency plans and ensuring that the project team is prepared for unforeseen challenges.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span ></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Resource Management</h3>
                <p>We assists in determining the necessary resources, including personnel, equipment, and materials, required to successfully complete the project. We help in optimizing resource allocation and managing dependencies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span ></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Closure and Evaluation</h3>
                <p> Once the project is completed, PMC assists in the closure process, ensuring that all deliverables are met, and necessary documentation is provided. They may also conduct post-project evaluations to identify lessons learned for future improvement.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
   	
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo esc_url(get_template_directory_uri());?>/images/about.jpg);">
					</div>
					<div class="col-md-7 wrap-about py-md-5 ftco-animate">
	          <div class="heading-section mb-5 pt-5 pl-md-5">
	          	<div class="pr-md-5 mr-md-5">
		            <h2 class="mb-4">What is all about us?</h2>
	            </div>

              <p>
             Welcome to Our Consultancy, your premier destination for project management excellence in Nyeri Town. Nestled on the 2nd floor of Batian Building, our consultancy is committed to transforming your visions into successful realities. With a focus on precision in planning and excellence in execution, our seasoned professionals bring a wealth of experience to guide your projects through complexities, offering strategic solutions that go beyond expectations. Rooted in the vibrant local community yet possessing a global perspective,Our Consultancy is your dedicated partner for achieving outstanding results. Join us at our Batian Building office, where professionalism meets innovation, and let's embark on a journey of unparalleled project success together.</p>	
	            <p><a href="#" class="btn btn-primary">Join now</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>



<?php
// Fetch all events from the database
global $wpdb;
$table_name = $wpdb->prefix . 'event';
$query = "SELECT * FROM $table_name LIMIT 2"; // Limit to 4 events
$events = $wpdb->get_results($query);

// Check if there are events to display
if ($events) {
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Events Schedule</h2>
                </div>
            </div>
            <div class="ftco-schedule">
                <div class="row">
                    <?php
                    // Loop through each event and display in the tab content
                    foreach ($events as $event) {
                        ?>
                        <div class="col-md-3 nav-link-wrap text-center text-md-left">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link ftco-animate"
                                   id="v-pills-<?php echo esc_attr($event->id); ?>-tab"
                                   data-toggle="pill"
                                   href="#v-pills-<?php echo esc_attr($event->id); ?>"
                                   role="tab"
                                   aria-controls="v-pills-<?php echo esc_attr($event->id); ?>"
                                   aria-selected="true">
                                    <?php echo esc_html($event->event_title); ?>
                                    <span><?php echo esc_html($event->event_date); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 tab-wrap">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active"
                                     id="v-pills-<?php echo esc_attr($event->id); ?>"
                                     role="tabpanel"
                                     aria-labelledby="v-pills-<?php echo esc_attr($event->id); ?>-tab">
                                    <div class="speaker-wrap ftco-animate d-md-flex">
                                        <div class="img speaker-img"
                                             style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/kiit.jpg);"></div>
                                        <div class="text">
                                            <h2><a href="#"><?php echo esc_html($event->event_title); ?></a></h2>
                                            <p><?php echo esc_html($event->event_fees); ?></p>
                                            <span
                                                class="time"><?php echo esc_html($event->event_duration); ?></span>
                                            <p class="location"><span
                                                        class="icon-map-o mr-2"></span><?php echo esc_html($event->event_location); ?></p>
                                            <h3 class="speaker-name">&mdash; <a href="#"></a> <span
                                                        class="position">Project Manager</span></h3>
                                            <a href="#"
                                               class="btn btn-primary px-9 py-2">Buy Ticket</a>
                                            <p><a href="<?php echo esc_url(home_url('/events')); ?>">View More</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    echo '<p>No events found.</p>';
}
?>


<?php get_footer(); ?>