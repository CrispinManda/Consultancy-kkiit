<?php 
/**
 * Template Name: Events
 */
get_header();?>

    <div class="hero-wrap" style="background-image: url('<?php echo esc_url(get_template_directory_uri());?>/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-lg-6 col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Explore Upcoming Events <br><span> <?php echo date ('Y-m-d');?> </span></h1>
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
    <form action="#" class="request-form ftco-animate">
        <h2>Join Conference</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Phone">
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
                <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Join now" class="btn btn-primary py-3 px-4">
        </div>
    </form>
</div>

        </div>
      </div>
    </div>

<?php
// Fetch all events from the database
global $wpdb;
$table_name = $wpdb->prefix . 'event';
$query = "SELECT * FROM $table_name "; // Limit to 4 events
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
                                            <p> <a href="<?php echo esc_url(home_url('/events')); ?>">View more</a></p>
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









<?php get_footer();?>