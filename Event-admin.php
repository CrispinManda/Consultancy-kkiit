<?php 
/**
 * Template Name: Events-admin
 */
get_header();?>


<div class="container" style="margin-top:120px;" >
    <form id="event-form" method="post">
    <div class="form-group">
        <label for="event-title">Event Title:</label>
        <input type="text" class="form-control" id="event-title" name="event_title" required>
    </div>
    <div class="form-group">
        <label for="event-date">Date:</label>
        <input type="date" class="form-control" id="event-date" name="event_date" required>
    </div>
    <div class="form-group">
        <label for="event-duration">Duration:</label>
        <input type="text" class="form-control" id="event-duration" name="event_duration" required>
    </div>
    <div class="form-group">
        <label for="event-location">Location:</label>
        <input type="text" class="form-control" id="event-location" name="event_location" required>
    </div>
    <div class="form-group">
        <label for="event-fees">Fees:</label>
        <input type="text" class="form-control" id="event-fees" name="event_fees" required>
    </div>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    <div class="text-center my-3">
        <input class="btn btn-primary" type="submit" value="Add Event" name="eventmessage">
    </div>
</form>
</div>




<?php
global $wpdb;
$table_name = $wpdb->prefix . 'event';
$query = "SELECT * FROM $table_name";
$events = $wpdb->get_results($query);

// Check if there are events to display
if ($events) {
    ?>
    <div class="container mt-4">
        
        <?php
        if (isset($_GET['delete_success'])) {
            echo '<div class="alert alert-success">Event deleted successfully!</div>';
        } elseif (isset($_GET['delete_error'])) {
            echo '<div class="alert alert-danger">Error deleting event. Please try again.</div>';
        } elseif (isset($_GET['edit_success'])) {
            echo '<div class="alert alert-success">Event edited successfully!</div>';
        } elseif (isset($_GET['edit_error'])) {
            echo '<div class="alert alert-danger">Error editing event. Please try again.</div>';
        }
        ?>
        <table class="table table-bordered" style="margin-top:20px;" >
        <h2 style="margin-top:120px;">Events</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Location</th>
                    <th>Fees</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each event and display in the table
                foreach ($events as $event) {
                    ?>
                    <tr>
                        <td><?php echo esc_html($event->id); ?></td>
                        <td><?php echo esc_html($event->event_title); ?></td>
                        <td><?php echo esc_html($event->event_date); ?></td>
                        <td><?php echo esc_html($event->event_duration); ?></td>
                        <td><?php echo esc_html($event->event_location); ?></td>
                        <td><?php echo esc_html($event->event_fees); ?></td>
                        <td>
                            <a href="?edit_event=<?php echo esc_attr($event->id); ?>" class="btn btn-primary">Edit</a>
                            <a href="?delete_event=<?php echo esc_attr($event->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Check if an edit request is made
    if (isset($_GET['edit_event'])) {
        $edit_event_id = intval($_GET['edit_event']);
        $event_to_edit = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $edit_event_id));

        if ($event_to_edit) {
            // Display the edit form
            ?>
            <div class="container mt-4" >
                <h2>Edit Event</h2>
                <form method="post" action="">
                    <input type="hidden" name="edit_event_id" value="<?php echo esc_attr($event_to_edit->id); ?>">
                    <label for="edit_event_title">Event Title:</label>
                    <input type="text" name="edit_event_title" id="edit_event_title" value="<?php echo esc_attr($event_to_edit->event_title); ?>">

                    <label for="edit_event_date">Event Date:</label>
                    <input type="date" name="edit_event_date" id="edit_event_date" value="<?php echo esc_attr($event_to_edit->event_date); ?>">

                    <label for="edit_event_duration">Event Duration:</label>
                    <input type="text" name="edit_event_duration" id="edit_event_duration" value="<?php echo esc_attr($event_to_edit->event_duration); ?>">

                    <label for="edit_event_location">Event Location:</label>
                    <input type="text" name="edit_event_location" id="edit_event_location" value="<?php echo esc_attr($event_to_edit->event_location); ?>">

                    <label for="edit_event_fees">Event Fees:</label>
                    <input type="text" name="edit_event_fees" id="edit_event_fees" value="<?php echo esc_attr($event_to_edit->event_fees); ?>">

                    <input type="submit" name="submit_edit_event" value="Save Changes" class="btn btn-primary">
                </form>
            </div>
            <?php
        }
    }

    // Handle event edit submission
    if (isset($_POST['submit_edit_event'])) {
        $edit_event_id = intval($_POST['edit_event_id']);
        $edit_event_title = sanitize_text_field($_POST['edit_event_title']);
        $edit_event_date = sanitize_text_field($_POST['edit_event_date']);
        $edit_event_duration = sanitize_text_field($_POST['edit_event_duration']);
        $edit_event_location = sanitize_textarea_field($_POST['edit_event_location']);
        $edit_event_fees = sanitize_textarea_field($_POST['edit_event_fees']);

        $edit_data = array(
            'event_title' => $edit_event_title,
            'event_date' => $edit_event_date,
            'event_duration' => $edit_event_duration,
            'event_location' => $edit_event_location,
            'event_fees' => $edit_event_fees,
        );

        $result = $wpdb->update($table_name, $edit_data, array('id' => $edit_event_id));

        // Redirect with success or error message
        if ($result) {
            wp_redirect(add_query_arg('edit_success', '1'));
            exit;
        } else {
            wp_redirect(add_query_arg('edit_error', '1'));
            exit;
        }
    }

    // Check if a delete request is made
    if (isset($_GET['delete_event'])) {
        $delete_event_id = intval($_GET['delete_event']);
        $result = $wpdb->delete($table_name, array('id' => $delete_event_id));

        // Redirect with success or error message
        if ($result) {
            wp_redirect(add_query_arg('delete_success', '1'));
            exit;
        } else {
            wp_redirect(add_query_arg('delete_error', '1'));
            exit;
        }
    }
} else {
    echo '<p>No events found.</p>';
}
?>


<?php displayRegisteredPeople();?>


<?php get_footer();?>