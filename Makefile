all :
	if [[ -e opencart-begateway-payment-module.zip ]]; then rm opencart-begateway-payment-module.zip; fi
	cd upload && zip -r ../opencart-begateway-payment-module.zip admin catalog
