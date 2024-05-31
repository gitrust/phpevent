
WORKDIR:=$(CURDIR)

installed:
	docker run -it --rm -v $(WORKDIR):/app composer show -i

update:
	docker run -it --rm -v $(WORKDIR):/app composer update

status:
	docker run -it --rm -v $(WORKDIR):/app composer status