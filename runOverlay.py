from PIL import Image
import sys

def overlay_green_signal(original_image_path, segmentation_image_path, output_image_path):
    # Load the original image and the segmentation image
    original_image = Image.open(original_image_path)
    segmentation_image = Image.open(segmentation_image_path)

    # Convert the segmentation image to RGBA (if it's not already in RGBA mode)
    segmentation_image = segmentation_image.convert("RGBA")

    # Create a new image with the same size as the segmentation image, filled with green
    green_image = Image.new("RGBA", segmentation_image.size, (0, 255, 0, 255))  # Green color (RGBA)

    # Use the segmentation image as a mask to only apply green where the original image is white
    segmentation_data = segmentation_image.getdata()

    # Create a new list to store the green pixels (replace white pixels with green)
    new_data = []
    for pixel in segmentation_data:
        # If the pixel is white (or close to white), change it to green
        if pixel[0] > 200 and pixel[1] > 200 and pixel[2] > 200:
            new_data.append((0, 255, 0, 255))  # Green pixel
        else:
            new_data.append((0, 0, 0, 0))  # Transparent pixel

    # Apply the new data to the segmentation image
    segmentation_image.putdata(new_data)

    # Now, overlay the green signal onto the original image using the alpha channel
    original_image = original_image.convert("RGBA")

    # Combine the original image with the green signal using alpha compositing
    combined_image = Image.alpha_composite(original_image, segmentation_image)

    # Save the final output
    combined_image.save(output_image_path)
    print(f"Output saved to {output_image_path}")

if __name__ == "__main__":
    # Ensure the script is called with the correct parameters
    if len(sys.argv) != 4:
        print("Usage: python overlay.py <original_image_path> <segmentation_image_path> <output_image_path>")
        sys.exit(1)

    # Get the paths from the command line arguments
    original_image_path = sys.argv[1]
    segmentation_image_path = sys.argv[2]
    output_image_path = sys.argv[3]

    # Call the function with the provided paths
    overlay_green_signal(original_image_path, segmentation_image_path, output_image_path)
