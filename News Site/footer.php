<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
                $setting_query = "SELECT * FROM `settings`";
                $setting_result = mysqli_query($db_connect, $setting_query) or die("Query Failed: Settings.");

                if (mysqli_num_rows($setting_result) > 0) {
                    while ($settings_row = mysqli_fetch_assoc($setting_result)) {
            ?>            
                <span><?php echo $settings_row['footer_desc']; ?></a></span>

            <?php
                    }
                }
            ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
