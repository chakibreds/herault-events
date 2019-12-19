TEX_FILE = rapport
DIR_OUTPUT = tmp_tex_files

all:
	@if [ ! -d "$(DIR_OUTPUT)" ]; then mkdir $(DIR_OUTPUT); fi;
	@pdflatex -output-directory $(DIR_OUTPUT) $(TEX_FILE) && mv $(DIR_OUTPUT)/$(TEX_FILE).pdf ./$(TEX_FILE).pdf

see:
	@evince $(TEX_FILE).pdf &

clean:
	@rm -f $(DIR_OUTPUT)/$(TEX_FILE).aux $(DIR_OUTPUT)/$(TEX_FILE).log $(DIR_OUTPUT)/$(TEX_FILE).fls $(DIR_OUTPUT)/$(TEX_FILE).fdb_latexmk
	@if [ -d "$(DIR_OUTPUT)" ]; then rmdir $(DIR_OUTPUT); fi;

mrproper: clean
	rm $(TEX_FILE).pdf