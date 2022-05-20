from requests import get
from json import loads
from rich.console import Console

CONSOLE = Console()

class fbi:
    def __init__(self) -> None:
        self.ROOT = 'http://localhost:3970/json-list'
        self.content: dict[str, str] = None

    def _get(self,*,page: int, data: str=None):
        if(not page.isnumeric()):return
        if(int(page)<1 or int(page)>40): return
        params = dict()
        params['page'] = page
        if(data): params['data'] = data
        req = get(self.ROOT, params=params)
        self.content = loads(req.content)
        return True

    def _print(self, sep='\n'):
        if(self.content):
            CONSOLE.print(
                sep.join(
                    f'[red]{idx+1})[/red][green]{data["name"]}[/green]'
                    for idx, data in enumerate(self.content)
                )
            )
        else: CONSOLE.print('[red bold]NO DATA[/red bold]')

f = fbi()

while True:
    pn = CONSOLE.input('[blue]Page: [blue]\n')
    data = CONSOLE.input('[yellow]Data[red](-1 = None)[/red]:[/yellow]\n')
    f._get(page=pn, data=data if data!='-1' else None)
    f._print()
    CONSOLE.input('[cyan]Press 0 to continue[/cyan]')
    CONSOLE.clear()