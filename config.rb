require "compass/import-once/activate"

add_import_path "bower_components/foundation/scss"

environment       = :development
preferred_syntax  = :scss
output_style      = :nested
line_comments     = true

http_path       = "/"
sass_dir        = "assets/styles"
css_dir         = "dist/styles"
javascripts_dir = "dist/scripts"
images_dir      = "dist/images"
fonts_dir       = "dist/fonts"
