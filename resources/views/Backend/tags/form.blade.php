{{csrf_field()}}      
              <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">tags Name</label>
                          <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}" class="form-control">
                        </div>
                      </div>
                     
                    </div>