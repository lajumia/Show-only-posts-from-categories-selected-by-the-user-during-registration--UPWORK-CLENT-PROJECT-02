# Show-only-posts-from-categories-selected-by-the-user-during-registration--UPWORK-CLENT-PROJECT-02

# User Category Post Filter

## Description

This plugin restricts post visibility based on categories selected by a user during registration. When a non-admin user logs in, they will only see posts from categories assigned to them via the custom user meta field `user_registration_user_categories`.

## Features

- Filters main post query on frontend.
- Hides all posts if the user has no assigned categories.
- Administrators are excluded from this filter.

## Installation

1. Upload the plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Ensure that the custom user meta field `user_registration_user_categories` is properly set (an array of category slugs).

## How It Works

- Hooks into `pre_get_posts`.
- Checks if the current user is logged in and not an administrator.
- Retrieves user categories from `user_registration_user_categories` meta field.
- Modifies the main query to only show posts from those categories.

## Notes

- This only affects the main query on archive and blog listing pages.
- Single post pages (`is_singular()`) are not affected.
- The plugin does not create or manage category checkboxes during registration. That should be handled separately.

## Example

If a user has this meta:

```php
['news', 'events']
```

Only posts from the "news" and "events" categories will be shown to them.

## License

GPL2
