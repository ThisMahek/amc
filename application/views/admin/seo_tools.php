<div class="col-sm-12">
    <?php $this->load->view('admin/includes/_messages'); ?>
</div>
<div class="wrapper2">

    <div class="mblog">

        <h4>SEO Settings</h4>
        <?php echo form_open('sitemap_controller/generate_sitemap_post'); ?>
        <div class="form-group">
            <label>Frequency (This value indicates how frequently the content at a particular URL is likely to change )</label>
            <select name="frequency" class="form-control">
                <option value="none" <?php echo ($this->general_settings->sitemap_frequency == 'none') ? 'selected' : ''; ?>><?php echo ucfirst('none'); ?></option>
                <option value="always" <?php echo ($this->general_settings->sitemap_frequency == 'always') ? 'selected' : ''; ?>><?php echo ucfirst('always'); ?></option>
                <option value="hourly" <?php echo ($this->general_settings->sitemap_frequency == 'hourly') ? 'selected' : ''; ?>><?php echo ucfirst('hourly'); ?></option>
                <option value="daily" <?php echo ($this->general_settings->sitemap_frequency == 'daily') ? 'selected' : ''; ?>><?php echo ucfirst('daily'); ?></option>
                <option value="weekly" <?php echo ($this->general_settings->sitemap_frequency == 'weekly') ? 'selected' : ''; ?>><?php echo ucfirst('weekly'); ?></option>
                <option value="monthly" <?php echo ($this->general_settings->sitemap_frequency == 'monthly') ? 'selected' : ''; ?>><?php echo ucfirst('monthly'); ?></option>
                <option value="yearly" <?php echo ($this->general_settings->sitemap_frequency == 'yearly') ? 'selected' : ''; ?>><?php echo ucfirst('yearly'); ?></option>
                <option value="never" <?php echo ($this->general_settings->sitemap_frequency == 'never') ? 'selected' : ''; ?>><?php echo ucfirst('never'); ?></option>
            </select>
        </div>
        <div class="form-group">
            <label>Last Modification (The time the URL was last modified) </label>
            <p>
                <input type="radio" name="last_modification" id="last_modification_1" value="none" class="square-purple" <?php echo ($this->general_settings->sitemap_last_modification == 'none') ? 'checked' : ''; ?>>
                <label for="last_modification_1" class="cursor-pointer">&nbsp;<?php echo ucfirst('none'); ?></label>
            </p>
            <p>
                <input type="radio" name="last_modification" id="last_modification_2" value="server_response" class="square-purple" <?php echo ($this->general_settings->sitemap_last_modification == 'server_response') ? 'checked' : ''; ?>>
                <label for="last_modification_2" class="cursor-pointer">&nbsp;Server's Response</label>
            </p>
        </div>
        <div class="form-group">
            <label>Priority (The priority of a particular URL relative to other pages on the same site) </label>
            <p>
                <input type="radio" name="priority" id="priority_1" value="none" class="square-purple" <?php echo ($this->general_settings->sitemap_priority == 'none') ? 'checked' : ''; ?>>
                <label for="priority_1" class="cursor-pointer">&nbsp;<?php echo ucfirst('none'); ?></label>
            </p>
            <p>
                <input type="radio" name="priority" id="priority_2" value="automatically" class="square-purple" <?php echo ($this->general_settings->sitemap_priority == 'automatically') ? 'checked' : ''; ?>>
                <label for="priority_2" class="cursor-pointer">&nbsp;Automatically Calculated Priority</label>
            </p>
        </div>
        <div class="sav-btn" style="padding-bottom:20px">
            <button type="submit" name="process" value="generate" class="btn btn-primary pull-right" style="margin-bottom: 5px; "><?php echo ucfirst('Download Sitemap'); ?></button>

            <button type="submit" style="margin-right: 5px;" name="process" value="update" class="btn btn-primary pull-right m-r-10"><?php echo ucfirst('Update Sitemap'); ?></button>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>

<div class="wrapper2">
    <div class="mblog">
        <h4>Google Analytics</h4>
        <?php echo form_open('admin/seo_tools_post'); ?>
        <div class="form-group">
            <label>Google Analytics</label>
            <textarea class="form-control text-area" name="google_analytics" placeholder="Google analytics code" style="min-height: 100px;"><?php echo html_escape($this->general_settings->google_analytics); ?></textarea>
        </div>
        <div class="sav-btn" style="padding-bottom:20px">
            <button type="submit" value="update" class="btn btn-primary pull-right m-r-10">Save Changes</button>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>