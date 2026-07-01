# Changelog

All notable changes to this project will be documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

### Added
- Sidebar logo section with `site_logo_white`, `site_logo_symbol`, and `site_name` from system settings
- Sidebar toggle button persists state via `localStorage`

### Changed
- Cleaned up sidebar partial — removed all commented-out menu items and inline HTML comments

---

## [1.0.2] — 2026-07-01

### Added
- Full "Add New User" modal with all profile fields (gender, phone, address, bio)
- Panel assignment in user create modal
- Phone code picker Alpine.js component (`_phone-code-picker.blade.php`) with search and deduplication
- Activity logging for Users module (created, updated, deleted, role changed, panel toggled, avatar, email/phone verification)
- Activity logging for Uploads module (uploaded, deleted)

### Changed
- Gender and country code fields now use system DB tables (`genders`, `countries`)
- Country code list deduplicated by `phone_code` (`unique('phone_code')`)
- Removed Laravel Policies (`PanelPolicy`, `UserPolicy`, `RolePolicy`) — access control is fully DB-driven via `user->panels()` relationship

### Fixed
- `++880` double-plus bug in phone code picker — `phone_code` in DB already includes `+` prefix
- Phone display in view modal no longer manually prepends `+`

---

## [1.0.1] — 2026-07-01

### Added
- Activity Log module (Spatie Laravel Activitylog)
- Auth activity tracking (login, logout, failed attempts, password reset)
- File uploads module with admin file manager
- Media picker component (`WithMediaPicker` trait)
- System Settings module

### Changed
- Admin sidebar layout and navigation structure

### Fixed
- Various bug fixes

---

## [1.0.0] — 2026-07-01

### Added
- Initial Laravel Starter Kit
- Laravel 11 + Livewire v3 base setup
- Spatie Permission (roles & permissions)
- Admin panel with sidebar navigation
- User management module
- Profile module
- Country and Gender seeders
- Fortify authentication with custom login response
