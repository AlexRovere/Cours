function toRot13(stringToTransform) {
  return stringToTransform
    .split("") // Transformation en array
    .map((char) => {
      // Création du nouveau tableau
      const code = char.charCodeAt(char); // Renvoi le code UTF-8 du carac

      if (code < 65 || code > 90) {
        // si différent de A-Z ne fait rien
        return String.fromCharCode(code);
      } else if (code < 78) {
        return String.fromCharCode(code + 13); // si inférieur à 78 (N) renvoi le code carac - 13
      } else {
        return String.fromCharCode(code - 13); // sinon renvoi le code carac + 13
      }
    })
    .join(""); // Concatène l'array en string
}

console.log(toRot13("URYYB JBEYQ")); // HELLO WORLD
