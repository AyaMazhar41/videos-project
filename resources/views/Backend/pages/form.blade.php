{{csrf_field()}}      
              <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">page Name</label>
                          <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta keywords</label>
                          <input type="text" name="meta_keywords"   value="{{isset($row) ? $row->meta_keywords : ''}}" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> Page Description</label>
                          <textarea name="des" cols="60" rows="10">
                            {{isset($row) ? $row->des : ''}}
                          </textarea>
                        </div>
                      </div>
                    </div>
                      
                   

                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea name="meta_description" cols="60" rows="10">
                            {{isset($row) ? $row->meta_description : ''}}
                          </textarea>
                        </div>
                      </div>
                    </div>