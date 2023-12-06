<link href="../css/styles.css" rel="stylesheet" />
<div class="d-flex " id="wrapper">
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page content wrapper-->
    <div id="page-content-wrapper">

        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-3">
            <div class="container-fluid">
                <button class="btn btn-warning" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link fw-bold" href="<?php echo e(route('blotter.settled')); ?>">Settled Cases</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold" href="<?php echo e(route('blotter.summary')); ?>">Search Case</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>


            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <?php if(Laravel\Fortify\Features::canUpdateProfileInformation()): ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.update-profile-information-form')->html();
} elseif ($_instance->childHasBeenRendered('77PXMGe')) {
    $componentId = $_instance->getRenderedChildComponentId('77PXMGe');
    $componentTag = $_instance->getRenderedChildComponentTagName('77PXMGe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('77PXMGe');
} else {
    $response = \Livewire\Livewire::mount('profile.update-profile-information-form');
    $html = $response->html();
    $_instance->logRenderedChild('77PXMGe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if(Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords())): ?>
                    <div class="mt-10 sm:mt-0">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.update-password-form')->html();
} elseif ($_instance->childHasBeenRendered('ssbO0xc')) {
    $componentId = $_instance->getRenderedChildComponentId('ssbO0xc');
    $componentTag = $_instance->getRenderedChildComponentTagName('ssbO0xc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ssbO0xc');
} else {
    $response = \Livewire\Livewire::mount('profile.update-password-form');
    $html = $response->html();
    $_instance->logRenderedChild('ssbO0xc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if(Laravel\Fortify\Features::canManageTwoFactorAuthentication()): ?>
                    <div class="mt-10 sm:mt-0">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.two-factor-authentication-form')->html();
} elseif ($_instance->childHasBeenRendered('cVM4rYo')) {
    $componentId = $_instance->getRenderedChildComponentId('cVM4rYo');
    $componentTag = $_instance->getRenderedChildComponentTagName('cVM4rYo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cVM4rYo');
} else {
    $response = \Livewire\Livewire::mount('profile.two-factor-authentication-form');
    $html = $response->html();
    $_instance->logRenderedChild('cVM4rYo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <div class="mt-10 sm:mt-0">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.logout-other-browser-sessions-form')->html();
} elseif ($_instance->childHasBeenRendered('3DX11V9')) {
    $componentId = $_instance->getRenderedChildComponentId('3DX11V9');
    $componentTag = $_instance->getRenderedChildComponentTagName('3DX11V9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3DX11V9');
} else {
    $response = \Livewire\Livewire::mount('profile.logout-other-browser-sessions-form');
    $html = $response->html();
    $_instance->logRenderedChild('3DX11V9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                    <?php if(Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures()): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <div class="mt-10 sm:mt-0">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.delete-user-form')->html();
} elseif ($_instance->childHasBeenRendered('GSwkGqW')) {
    $componentId = $_instance->getRenderedChildComponentId('GSwkGqW');
    $componentTag = $_instance->getRenderedChildComponentTagName('GSwkGqW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GSwkGqW');
} else {
    $response = \Livewire\Livewire::mount('profile.delete-user-form');
    $html = $response->html();
    $_instance->logRenderedChild('GSwkGqW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script><?php /**PATH C:\Users\eplum\Desktop\Thesis\BARRIO FILE\barrio\resources\views/profile/show.blade.php ENDPATH**/ ?>