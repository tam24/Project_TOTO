  <div class="container">
    <?php if ($displayForm) : ?>
    <h1 class="display-3"> Add student </h1>
    <form method="post" action="" >

      <div class="form-group">
          <label for="InputLastName">Last Name</label>
          <input type="text" name="InputLastName" class="form-control" id="InputLastName" placeholder="Last Name" value="<?php echo $lastName; ?>" />
      </div>

      <div class="form-group">
        <label for="InputFirstName">Name</label>
        <input type="text" name="InputFirstName" class="form-control" id="InputFirstName" placeholder="Name" value="<?php echo $firstName; ?>" />
      </div>

      <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" name="InputEmail" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email; ?>" />
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="DoB">Date of Birth </label>
        <input type="text" name="DoB" class="form-control"  id="DoB" placeholder="yyyy-mm-dd" value="<?php echo $dOb; ?>" />
        <small id="dateHelp" class="form-text text-muted">  Date of birth example: 1900-12-31 (31st of December 1900).</small>

      </div>

      <div class="form-check">
        <div class="form-group">
          <label for="FriendlinessSelect">Friendliness</label>
          <select class="form-control" name="FriendlinessSelect" id="FriendlinessSelect" value="<?php echo $friendlinessSelect; ?>" />
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>

        <div class="form-group">
        <label for="SessionSelect">Session</label>
        <select class="form-control" name="SessionSelect" id="SessionSelect" value= "<?php echo $sessionSelect; ?>"/>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <div class="form-group">
        <label for="CitySelect">City</label>
        <select class="form-control" name="CitySelect" id="CitySelect" value= "<?php echo $sessionSelect; ?>"/>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <div class="form-group">
        <label for="FormControlFile">Image</label>
        <input type="file" name="FormControlFile" class="form-control-file" id="FormControlFile">
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  <?php endif; ?>
  </div>
