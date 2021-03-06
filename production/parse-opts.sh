#!/usr/bin/env bash
#

SCRIPT_PATH=${SCRIPT_PATH:-$(pwd)}

set -- $( getopt -l buildArea:,stream:,branch: -o "" --  "$@" )


while [ $# -gt 0 ]; do
  case "$1" in
    "--buildArea")
      buildArea="$2"; shift;;
    "--stream")
      stream="$2"; shift;;
    "--branch")
      branch="$2"; shift;;
  esac
  shift
done

buildArea_branch=$buildArea/$branch
gitCache=$buildArea_branch/gitCache


if [ -r $gitCache/eclipse.platform.releng.aggregator ]; then
  pushd $gitCache/eclipse.platform.releng.aggregator
else
fi
