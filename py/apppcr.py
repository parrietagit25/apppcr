import os
# Fixing the error by ensuring files are only created in non-root directories
directory_structure_fixed = {
    "css": ["bootstrap.min.css"],
    "js": ["bootstrap.bundle.min.js", "app.js"],
    "templates": ["header.php", "footer.php"],
    "": ["index.php"]  # Root file
}

# Updated function to handle root directory file creation properly
def create_project_structure_v2(base_path, structure):
    for folder, contents in structure.items():
        folder_path = os.path.join(base_path, folder)
        if folder:  # Only create folder if folder string is not empty
            os.makedirs(folder_path, exist_ok=True)
        for item in contents:
            file_path = os.path.join(base_path if not folder else folder_path, item)
            with open(file_path, 'w') as f:
                f.write('')  # Create an empty file

# Set the base directory for the project
base_directory_fixed = "./apppcr"

# Create the project structure
create_project_structure_v2(base_directory_fixed, directory_structure_fixed)

base_directory_fixed
