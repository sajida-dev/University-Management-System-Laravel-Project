@extends('layouts.app')
@section('page-name', 'Edit Disability Details')
@section('admin-main')

    <script src="https://admissions.uoel.edu.pk/admin_asset/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                $('.select2').select2();

            });
        });
    </script>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Edit Disability Detail
                    </h2>
                </div>
                <div class="card-body show">
                    <div class="panel-content">
                        <form method="post" action="{{ route('admission.disability-detail.update', $disabilityDetail->id) }}"
                            enctype="multipart/form-data">@csrf
                            <div class="row mb-3">
                                <label for="DisabilityStatus" class="col-sm-2 col-form-label"> Any Disability: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select value="{{ old('DisabilityStatus') }}" name="DisabilityStatus"
                                        id="DisabilityStatus" class="form-control select2" required>
                                        <option value="">Are you disable person</option>
                                        @if ($disabilityStatus)
                                            <option selected value="1">Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option selected value="0">No</option>
                                        @endif
                                    </select>
                                    <x-input-error :messages="$errors->get('DisabilityStatus')"
                                        class="mt-2 @error('DisabilityStatus')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3 disability">
                                <label for="DisabilityType" class="col-sm-2 col-form-label"> Disability Type: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select value="{{ old('DisabilityType') }}" name="DisabilityType" id="DisabilityType"
                                        class="form-control select2" required>
                                        <option value="">Choose Disability Type</option>
                                        <option selected value="{{ $disabilityDetail->disability_type }}">
                                            {{ $disabilityDetail->disability_type }}
                                        </option>
                                        <option value="Alzheimer's Disease">Alzheimer's Disease</option>
                                        <option value="Amputate left arm">Amputate left arm</option>
                                        <option value="Amputate left foot">Amputate left foot</option>
                                        <option value="Amputate left hand">Amputate left hand</option>
                                        <option value="Amputate left leg">Amputate left leg</option>
                                        <option value="Amputate right arm">Amputate right arm</option>
                                        <option value="Amputate right foot">Amputate right foot</option>
                                        <option value="Amputate right hand">Amputate right hand</option>
                                        <option value="Amputate right leg">Amputate right leg</option>
                                        <option value="Amputation">Amputation</option>
                                        <option value="Amputee (from injury or deformity)">Amputee (from injury or
                                            deformity)</option>
                                        <option
                                            value="Amyotrophic Lateral Sclerosis (ALS) - Also known as Lou Gehrig's Disease">
                                            Amyotrophic Lateral Sclerosis (ALS) - Also known as Lou Gehrig's Disease
                                        </option>
                                        <option value="Arthritis">Arthritis</option>
                                        <option value="Asberger's Syndrome">Asberger's Syndrome</option>
                                        <option value="Atrophic Myopathy">Atrophic Myopathy</option>
                                        <option value="Autism">Autism</option>
                                        <option value="Bipolar Disorder">Bipolar Disorder</option>
                                        <option
                                            value="Blind in both eyes (No usable vision, but may have some light perception)">
                                            Blind in both eyes (No usable vision, but may have some light perception)
                                        </option>
                                        <option value="Blindness">Blindness</option>
                                        <option value="Blindness / Visual Impairment">Blindness / Visual Impairment</option>
                                        <option value="Cerebral Palsy">Cerebral Palsy</option>
                                        <option value="Color Blindness">Color Blindness</option>
                                        <option value="Complete Paralysis both arms">Complete Paralysis both arms</option>
                                        <option value="Complete Paralysis both hands">Complete Paralysis both hands</option>
                                        <option value="Complete Paralysis both legs">Complete Paralysis both legs</option>
                                        <option value="Complete Paralysis lower half of body, including legs">Complete
                                            Paralysis lower half of body, including legs</option>
                                        <option value="Complete Paralysis one arm">Complete Paralysis one arm</option>
                                        <option value="Complete Paralysis one leg">Complete Paralysis one leg</option>
                                        <option value="Complete Paralysis one side of body, including one arm and one leg">
                                            Complete Paralysis one side of body, including one arm and one leg</option>
                                        <option
                                            value="Complete Paralysis three or more major parts of the body (arms and legs)">
                                            Complete Paralysis three or more major parts of the body (arms and legs)
                                        </option>
                                        <option value="Complex Trauma">Complex Trauma</option>
                                        <option value="Convulsive Disorder (e.g. Epilepsy)">Convulsive Disorder (e.g.
                                            Epilepsy)</option>
                                        <option value="Deaf & Blind">Deaf & Blind</option>
                                        <option value="Deafness">Deafness</option>
                                        <option value="Diabetes">Diabetes</option>
                                        <option value="Down Syndrome">Down Syndrome</option>
                                        <option value="Dwarfism">Dwarfism</option>
                                        <option value="Dyslexia">Dyslexia</option>
                                        <option value="Epilepsy">Epilepsy</option>
                                        <option value="Fetal Alcohol Syndrome">Fetal Alcohol Syndrome</option>
                                        <option value="Growth Hormone Deficiency">Growth Hormone Deficiency</option>
                                        <option value="Hemiplegia">Hemiplegia</option>
                                        <option value="Hip Rheumatoid Arthritis : (RA Hip Joint)">Hip Rheumatoid Arthritis :
                                            (RA Hip Joint)</option>
                                        <option value="Inability to read ordinary size print, not correctable by glasses">
                                            Inability to read ordinary size print, not correctable by glasses</option>
                                        <option value="Kyphoplasty">Kyphoplasty</option>
                                        <option value="Language and Speech Disability">Language and Speech Disability
                                        </option>
                                        <option value="Left Hemiplegia">Left Hemiplegia</option>
                                        <option value="Left or Right Leg Disabilities">Left or Right Leg Disabilities
                                        </option>
                                        <option value="Locked-In Syndrome">Locked-In Syndrome</option>
                                        <option value="Major Trauma">Major Trauma</option>
                                        <option value="Medical Trauma">Medical Trauma</option>
                                        <option value="Mental or emotional illness">Mental or emotional illness</option>
                                        <option value="Mental retardation">Mental retardation</option>
                                        <option value="Mental Retardation">Mental Retardation</option>
                                        <option value="Missing both feet or legs">Missing both feet or legs</option>
                                        <option value="Missing both hands or arms">Missing both hands or arms</option>
                                        <option value="Missing both hands or arms and both feet or legs">Missing both hands
                                            or arms and both feet or legs</option>
                                        <option value="Missing both hands or arms and one foot or leg">Missing both hands or
                                            arms and one foot or leg</option>
                                        <option value="Missing left hand fingers">Missing left hand fingers</option>
                                        <option value="Missing one arm">Missing one arm</option>
                                        <option value="Missing one hand or arm and both feet or legs">Missing one hand or
                                            arm and both feet or legs</option>
                                        <option value="Missing one hand or arm and one foot or leg">Missing one hand or arm
                                            and one foot or leg</option>
                                        <option value="Missing one leg">Missing one leg</option>
                                        <option value="Missing right hand fingers">Missing right hand fingers</option>
                                        <option value="Mobility Impairment">Mobility Impairment</option>
                                        <option value="Multiple Sclerosis">Multiple Sclerosis</option>
                                        <option value="Muscular Dystrophy">Muscular Dystrophy</option>
                                        <option value="Mutism">Mutism</option>
                                        <option value="Obsessive-Compulsive Disorder">Obsessive-Compulsive Disorder
                                        </option>
                                        <option value="Paraplegia">Paraplegia</option>
                                        <option value="Parkinson's Disease">Parkinson's Disease</option>
                                        <option value="Partial Paralysis">Partial Paralysis</option>
                                        <option value="Partial Paralysis both arms, any part">Partial Paralysis both arms,
                                            any part</option>
                                        <option value="Partial Paralysis both legs, any part">Partial Paralysis both legs,
                                            any part</option>
                                        <option value="Partial Paralysis one arm">Partial Paralysis one arm</option>
                                        <option value="Partial Paralysis one side of body, including one arm and one leg">
                                            Partial Paralysis one side of body, including one arm and one leg</option>
                                        <option
                                            value="Partial Paralysis three or more major parts of the body (arms and legs)">
                                            Partial Paralysis three or more major parts of the body (arms and legs)</option>
                                        <option value="Polio">Polio</option>
                                        <option value="Quadriplegia or Quadraplegia / Tetraplegia">Quadriplegia or
                                            Quadraplegia / Tetraplegia</option>
                                        <option value="Refugee Trauma">Refugee Trauma</option>
                                        <option value="Right Hemiplegia">Right Hemiplegia</option>
                                        <option value="Schizophrenia">Schizophrenia</option>
                                        <option value="Secondary Trauma">Secondary Trauma</option>
                                        <option value="Selective Mutism">Selective Mutism</option>
                                        <option
                                            value="Severe distortion of limbs and/or spine (e.g., dwarfism, kyphosis = severe distortion of back)">
                                            Severe distortion of limbs and/or spine (e.g., dwarfism, kyphosis = severe
                                            distortion of back)</option>
                                        <option value="Severe Emotional Disturbance (SED)">
                                            Severe Emotional Disturbance (SED)</option>
                                        <option value="Shaken Baby Syndrome">Shaken Baby Syndrome</option>
                                        <option value="Speech Disability">Speech Disability</option>
                                        <option value="Spina Bifida">Spina Bifida</option>
                                        <option value="Spinal Cord Injury">Spinal Cord Injury</option>
                                        <option value="Stroke">Stroke</option>
                                        <option value="Total deafness in both ears and unable to speak clearly">Total
                                            deafness in both ears and unable to speak clearly</option>
                                        <option value="Total deafness in both ears, with understandable speech">Total
                                            deafness in both ears, with understandable speech</option>
                                        <option value="Tourette's Syndrome">Tourette's Syndrome</option>
                                        <option value="Traumatic Brain Injury">Traumatic Brain Injury</option>
                                        <option value="Weakness of lower & upper limbs">Weakness of lower & upper limbs
                                        </option>
                                        <option value="Weakness of lower limbs">Weakness of lower limbs</option>
                                        <option value="Weakness of upper limbs">Weakness of upper limbs</option>
                                        <option value="Other">Other</option>

                                    </select>
                                    <x-input-error :messages="$errors->get('DisabilityType')"
                                        class="mt-2 @error('DisabilityType')
has-error
@enderror" />
                                </div>
                            </div>

                            <div class="row mb-3 disability">
                                <label for="DisabilityAccommodation" class="col-sm-2 col-form-label"> Accommodation for
                                    Entrance Exam: <span class="text-success">(optional)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="DisabilityAccommodation" id="DisabilityAccommodation"
                                        class="form-control"
                                        value="{{ $disabilityDetail->accomodation_for_entrance_exam }}">
                                    <x-input-error :messages="$errors->get('DisabilityAccommodation')"
                                        class="mt-2 @error('DisabilityAccommodation')
has-error
@enderror" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 text-right">
                                    <button type="submit" class="btn btn-primary">Save <span
                                            class="fa fa-save"></span></button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {




            // when page will load this will check the types of disability

            // This will check if the disability yes or no
            var is_disability_status_check = $('#DisabilityStatus').val();
            // This will check if the other disability
            var is_disability_other_check = $('#DisabilityType').val();
            // 1= yes and 0=no
            if (is_disability_status_check == 1 && is_disability_other_check != '0') {
                // alert('one')
                $('#OtherDisabilityType').removeAttr("required");
                $('#DisabilityType').attr("required", "required");
                $('.disability').show();
                $('.otherdisability').hide().val(" ");

            } else if (is_disability_status_check == 1 && is_disability_other_check == '0') {
                // alert('both')
                $('#OtherDisabilityType').attr("required", "required");
                $('#DisabilityType').attr("required", "required");
                $('.disability').show();
                $('.otherdisability').show();

            } else if (is_disability_status_check == 0) {
                // alert('both')
                $('#OtherDisabilityType').removeAttr("required");
                $('#DisabilityType').removeAttr("required", "required");
                $('#OtherDisabilityType').val(" ");
                $('#DisabilityType').val(" ");
                $('.disability').hide();
                $('.otherdisability').hide();

            }

            $('#DisabilityStatus').change(function() {
                var is_disable = $(this).val();

                if (is_disable == 0) {
                    $('.disability').hide();
                    $('.otherdisability').hide();
                    $('#DisabilityType').val(" ");
                    $('#DisabilityType').prop('selected', false)
                    $('#DisabilityType').removeAttr("required");
                    $('#OtherDisabilityType').removeAttr("required");
                } else if (is_disable == 1) {
                    $('.disability').show();
                    $('.select2').select2({
                        width: '100%'
                    });
                    $('#DisabilityType').attr("required", "required");
                    $('#OtherDisabilityType').attr("required", "required");
                } else if (is_disable == " ") {
                    $('#DisabilityType').removeAttr("required");
                    $('#OtherDisabilityType').removeAttr("required");
                    $('.disability').hide();

                }
            });

            $('#DisabilityType').change(function() {

                var other_disable = $(this).val();

                if (other_disable == '0') {
                    $('.otherdisability').show();
                    $('#OtherDisabilityType').show();
                    $('#OtherDisabilityType').attr("required", "required");

                } else {
                    $('#OtherDisabilityType').removeAttr("required");
                    $('#OtherDisabilityType').val(" ");
                    $('.otherdisability').hide();
                }
            });
        });
    </script>
@endsection
