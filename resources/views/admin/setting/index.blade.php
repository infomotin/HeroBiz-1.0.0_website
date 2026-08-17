@extends('admin.layouts.app')
@section('title', 'Settings')
@section('header', 'Site Settings')

@section('content')
<form action="{{ route('admin.setting.update') }}" method="POST">
    @csrf @method('PUT')
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Contact Information</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="settings[contact_phone][value]" value="{{ $settings['contact_phone']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[contact_phone][type]" value="text">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="settings[contact_email][value]" value="{{ $settings['contact_email']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[contact_email][type]" value="text">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="settings[contact_address][value]" value="{{ $settings['contact_address']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            <input type="hidden" name="settings[contact_address][type]" value="text">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Google Maps Embed URL</label>
            <input type="url" name="settings[google_maps_embed][value]" value="{{ $settings['google_maps_embed']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            <input type="hidden" name="settings[google_maps_embed][type]" value="url">
        </div>

        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Social Links</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Twitter URL</label>
                <input type="url" name="settings[social_twitter][value]" value="{{ $settings['social_twitter']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[social_twitter][type]" value="url">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Facebook URL</label>
                <input type="url" name="settings[social_facebook][value]" value="{{ $settings['social_facebook']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[social_facebook][type]" value="url">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Instagram URL</label>
                <input type="url" name="settings[social_instagram][value]" value="{{ $settings['social_instagram']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[social_instagram][type]" value="url">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                <input type="url" name="settings[social_linkedin][value]" value="{{ $settings['social_linkedin']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[social_linkedin][type]" value="url">
            </div>
        </div>

        <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Site Info</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Site Name</label>
                <input type="text" name="settings[site_name][value]" value="{{ $settings['site_name']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[site_name][type]" value="text">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Site Tagline</label>
                <input type="text" name="settings[site_tagline][value]" value="{{ $settings['site_tagline']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <input type="hidden" name="settings[site_tagline][type]" value="text">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Footer Copyright Text</label>
            <input type="text" name="settings[footer_copyright][value]" value="{{ $settings['footer_copyright']->value ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            <input type="hidden" name="settings[footer_copyright][type]" value="text">
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Settings</button>
    </div>
</form>
@endsection
