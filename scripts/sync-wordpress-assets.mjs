import { copyFile, mkdir } from "node:fs/promises";
import { dirname, resolve } from "node:path";
import { fileURLToPath } from "node:url";

const projectRoot = resolve(dirname(fileURLToPath(import.meta.url)), "..");
const copies = [
  ["dist/styles.css", "wordpress/wp-content/themes/kigure-portfolio/assets/css/styles.css"],
  ["dist/script.js", "wordpress/wp-content/themes/kigure-portfolio/assets/js/script.js"],
];

for (const [source, destination] of copies) {
  const sourcePath = resolve(projectRoot, source);
  const destinationPath = resolve(projectRoot, destination);
  await mkdir(dirname(destinationPath), { recursive: true });
  await copyFile(sourcePath, destinationPath);
}

console.log("WordPress theme assets synchronized.");
