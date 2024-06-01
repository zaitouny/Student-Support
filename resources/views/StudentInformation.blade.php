@foreach($subjects as $subject)
            <div class="col-lg-2 col-md-4 col-sm-6 ">
                <div class="service-item text-center pt-3">
                    <div class="p-4" >
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">{{ $subject->name }}</h5>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#referenceModal{{$subject->id}}">Associated subject<
                        @php
                            $allPrerequisitesCompleted = true; // افتراضيا، نفترض أن جميع المتطلبات السابقة قد اكتملت
                        @endphp
                        
                    </div>  
                </div>
            
                <!-- Modal -->
                <div class="modal fade" id="referenceModal{{$subject->id}}" tabindex="-1" aria-labelledby="referenceModal{{$subject->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="referenceModal{{$subject->id}}Label">Associated for {{ $subject->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h6>Prerequisites:</h6>
                                    @if($subject->prerequisites->isNotEmpty())
                                        <ul>
                                            @foreach($subject->prerequisites as $prerequisite)
                                                <li>{{ $prerequisite->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span>No prerequisites</span>
                                    @endif
                                </div>
                                <div>
                                    <h6>Dependents:</h6>
                                    @if($subject->dependents->isNotEmpty())
                                        <ul>
                                            @foreach($subject->dependents as $dependent)
                                                <li>{{ $dependent->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span>No dependents</span>
                                    @endif
                                </div>
                            </div>  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach