all :
	if [[ -e opencart-erip-payment-module.zip ]]; then rm opencart-erip-payment-module.zip; fi
	cd upload && zip -r ../opencart-erip-payment-module.zip admin catalog -x *.DS_Store*
