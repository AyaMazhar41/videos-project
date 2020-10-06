{{csrf_field()}}      
         <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> Name</label>
                          <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta keywords</label>
                          <input type="text" name="meta_keywords"   value="{{isset($row) ? $row->meta_keywords : ''}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div >
                          <label>image</label>
                          <input type="file" name="image" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">youtube</label>
                          <input type="url" name="youtube"   value="{{isset($row) ? $row->youtube : ''}}" class="form-control">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">video status</label>
                         
                          <select name="published"  class="form-control" style="color: black">
                           <option value="1" {{isset($row) &&  $row->published ==1 ?'selected' : ''}} >
                           published
                         </option>
                            <option value="0"  {{isset($row) &&  $row->published ==0 ?'selected' : ''}}>hidden
                            </option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">category</label>
                         
                        <select name="cat_id"  class="form-control" style="color: black">
                         @foreach($categories as $category)
                         <option value="{{$category->id}}"  {{isset($row) &&  $row->cat_id == $category->id ?'selected' : ''}}>{{$category->name}}
                            </option>
                         }
                         }
                         @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> video Description</label>
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


                       <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">skills</label>
                         
                        <select name="skills[]"  class="form-control" multiple style="height: 100px">
                         @foreach($skills as $skill)
                           <option value="{{$skill->id}}" {{ in_array( $skill->id,$selectedSkills) ? 'selected': '' }}> {{$skill->name}}</option>

                          @endforeach
                          </select>
                        </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">tags</label>
                         
                        <select name="tags[]"  class="form-control" multiple style="height: 100px">
                         @foreach($tags as $tag)
                           <option value="{{$tag->id}}"  {{ in_array( $tag->id,$selectedTags) ? 'selected': '' }}> {{$tag->name}}</option>

                          @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
