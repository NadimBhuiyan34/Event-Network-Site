 @props(['categories'])
 
 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                         <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Create New Event</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                                         aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                     <form id="eventForm" action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST"> 
                                        @csrf
                                       
                                         <div class="form-group row mb-2">
                                             <label for="title" class="col-sm-2 col-form-label">Title:</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control" id="title"
                                                     name="title" required>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-2">
                                             <label for="description"
                                                 class="col-sm-2 col-form-label">Description:</label>
                                             <div class="col-sm-10">
                                                 <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                             </div>
                                         </div>

                                         <div class="form-group row mb-2">
                                             <label for="date" class="col-sm-2 col-form-label">Date:</label>
                                             <div class="col-sm-4">
                                                 <input type="date" class="form-control" id="date"
                                                     name="date" required>
                                             </div>
                                             <label for="startTime" class="col-sm-2 col-form-label">Category</label>
                                             <div class="col-sm-4">
                                                  <select name="category" id="" class="form-control">
                                                    <option value="" class="disable">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                  </select>
                                             </div>
                                         </div>

                                         <div class="form-group row mb-2">
                                             <label for="endTime" class="col-sm-2 col-form-label">Start Time:</label>
                                             <div class="col-sm-4">
                                                 <input type="time" class="form-control" id="endTime"
                                                     name="startTime" required>
                                             </div>
                                              <label for="startTime" class="col-sm-2 col-form-label">End
                                                 Time:</label>
                                             <div class="col-sm-4">
                                                 <input type="time" class="form-control" id="startTime"
                                                     name="endTime" required>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-2">
                                             <label for="bannerImage" class="col-sm-2 col-form-label">Banner
                                                 Image:</label>
                                             <div class="col-sm-10">
                                                 <input type="file" class="form-control" id="bannerImage"
                                                     name="bannerImage">
                                             </div>
                                         </div>
                                         <div class="form-group row mb-2">
                                             <label for="multipleImages" class="col-sm-2 col-form-label">Multiple
                                                 Images:</label>
                                             <div class="col-sm-10">
                                                 <input type="file" class="form-control" id="multipleImages"
                                                     name="images[]" multiple>
                                                 
                                             </div>
                                         </div>
                                         <div class="form-group row mb-2">
                                             <label for="location" class="col-sm-2 col-form-label">Location:</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control" id="location"
                                                     name="location" multiple>
                                                 
                                             </div>
                                         </div>
                                         <div class="form-group row mb-2">
                                             <div class="col-sm-10 offset-sm-2">
                                                 <button type="submit" class="btn btn-primary">Submit</button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                              
                         </div>
                     </div>