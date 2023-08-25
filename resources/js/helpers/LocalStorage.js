export const saveLS =  (categoryData, idUser) => {
	const getListProduct = (JSON.parse(localStorage.getItem(idUser)) || []);
	const posicion = getListProduct.indexOf(getListProduct.find(categoryo => categoryo.id === categoryData['id']));

	let _category = categoryData
	if (posicion !== -1) {
		_category = getListProduct[posicion]
		_category['amount'] = _category['amount'] + 1;
		// listProduct.splice(posicion, 1, _category);
	} else {
		_category['amount'] = 1;
		getListProduct.push(_category)
	}

	localStorage.setItem(idUser, JSON.stringify(getListProduct));
}